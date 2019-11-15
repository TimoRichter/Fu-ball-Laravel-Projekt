<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Team
 *
 * @property int $id
 * @property string $teamname
 * @property int $league_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Game[] $guestgames
 * @property-read int|null $guestgames_count
 * @property-read Collection|Game[] $homegames
 * @property-read int|null $homegames_count
 * @property-read League $leagues
 * @property-read Collection|Player[] $players
 * @property-read int|null $players_count
 * @method static Builder|Team newModelQuery()
 * @method static Builder|Team newQuery()
 * @method static Builder|Team query()
 * @method static Builder|Team whereCreatedAt($value)
 * @method static Builder|Team whereId($value)
 * @method static Builder|Team whereLeagueId($value)
 * @method static Builder|Team whereTeamname($value)
 * @method static Builder|Team whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Stat $stats
 * @property-read StatsBackup $stats_backup
 */
class Team extends Model
{
//
    public $standing;
    public $wins = 0;
    public $ties = 0;
    public $loses = 0;
    public $points = 0;
    public $goals = 0;
    public $winrate = 0;
    public $takengoals = 0;
    public $playedgames = 0;
    protected $players = [];
    protected $table = 'teams';
    protected $fillable = ['teamname', 'league_id'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function homegames()
    {
        return $this->hasMany(Game::class);
    }

    public function guestgames()
    {
        return $this->hasMany(Game::class);
    }

    public function leagues()
    {
        return $this->belongsTo(League::class, 'league_id');

    }


    public function stats()
    {
        return $this->hasOne(Stat::class, 'team_id');
    }

    public function stats_backup()
    {
        return $this->hasOne(StatsBackup::class, 'team_id');
    }

    public function home()
    {
        $homegames = Game::whereHome($this->id)->get();
        foreach ($homegames as $homegame) {
            /** @var Game $homegame */
            if (strtotime($homegame->date) < time()) {
                //punkte bei Heimspielen
                if ($homegame->homegoals > $homegame->guestgoals) {
                    $this->points = $this->points + 3;
                    $this->wins++;
                }
                if ($homegame->homegoals == $homegame->guestgoals) {
                    $this->points++;
                    $this->ties++;
                }
                if ($homegame->homegoals < $homegame->guestgoals) {
                    $this->loses++;
                }
                //tore
                $this->goals = $this->goals + $homegame->homegoals;
                //gegentore
                $this->takengoals = $this->takengoals + $homegame->guestgoals;
                //spiele
                $this->playedgames++;
                //winrate
                $this->winrate = ($this->wins / $this->playedgames) * 100;
            }
        }
    }

    public function guest()
    {
        $awaygames = Game::whereGuest($this->id)->get();
        foreach ($awaygames as $awaygame) {
            /** @var Game $awaygame */
            if (strtotime($awaygame->date) < time()) {
                //punkte bei Gastspielen
                if ($awaygame->guestgoals > $awaygame->homegoals) {
                    $this->points = $this->points + 3;
                    $this->wins++;
                }
                if ($awaygame->guestgoals == $awaygame->homegoals) {
                    $this->points++;
                    $this->ties++;
                }
                if ($awaygame->guestgoals < $awaygame->homegoals) {
                    $this->loses++;
                }
                //tore
                $this->goals = $this->goals + $awaygame->guestgoals;
                //gegentore
                $this->takengoals = $this->takengoals + $awaygame->homegoals;
                //spiele
                $this->playedgames++;
                //winrate
                $this->winrate = ($this->wins / $this->playedgames) * 100;
            }
        }
    }
}
