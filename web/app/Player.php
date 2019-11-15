<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Player
 *
 * @property int $id
 * @property int $team_id
 * @property int|null $shirtnumber
 * @property string $playername
 * @property string $nationality
 * @property int $games
 * @property int $goals
 * @property int $assists
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Team $teams
 * @method static Builder|Player newModelQuery()
 * @method static Builder|Player newQuery()
 * @method static Builder|Player query()
 * @method static Builder|Player whereAssists($value)
 * @method static Builder|Player whereCreatedAt($value)
 * @method static Builder|Player whereGames($value)
 * @method static Builder|Player whereGoals($value)
 * @method static Builder|Player whereId($value)
 * @method static Builder|Player whereNationality($value)
 * @method static Builder|Player wherePlayername($value)
 * @method static Builder|Player whereShirtnumber($value)
 * @method static Builder|Player whereTeamId($value)
 * @method static Builder|Player whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Player extends Model
{
    //
    protected $table = 'players';
    protected $fillable = ['team_id', 'shirtnumber', 'playername', 'nationality', 'games', 'goals', 'assists'];


    public function teams()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    public function leagues()
    {
        return $this->hasOneThrough(League::class, Team::class);
    }

}
