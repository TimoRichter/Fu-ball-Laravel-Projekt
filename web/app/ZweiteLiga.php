<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\ZweiteLiga
 *
 * @property int $id
 * @property int $team_id
 * @property int $points
 * @property int $goals
 * @property int $takengoals
 * @property int $playedgames
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Team $teams
 * @method static Builder|ZweiteLiga newModelQuery()
 * @method static Builder|ZweiteLiga newQuery()
 * @method static Builder|ZweiteLiga query()
 * @method static Builder|ZweiteLiga whereCreatedAt($value)
 * @method static Builder|ZweiteLiga whereGoals($value)
 * @method static Builder|ZweiteLiga whereId($value)
 * @method static Builder|ZweiteLiga wherePlayedgames($value)
 * @method static Builder|ZweiteLiga wherePoints($value)
 * @method static Builder|ZweiteLiga whereTakengoals($value)
 * @method static Builder|ZweiteLiga whereTeamId($value)
 * @method static Builder|ZweiteLiga whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ZweiteLiga extends Model
{
    protected $table= 'zweite_liga';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames', 'winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
