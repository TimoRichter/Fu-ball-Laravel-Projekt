<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\DritteLiga
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
 * @method static Builder|DritteLiga newModelQuery()
 * @method static Builder|DritteLiga newQuery()
 * @method static Builder|DritteLiga query()
 * @method static Builder|DritteLiga whereCreatedAt($value)
 * @method static Builder|DritteLiga whereGoals($value)
 * @method static Builder|DritteLiga whereId($value)
 * @method static Builder|DritteLiga wherePlayedgames($value)
 * @method static Builder|DritteLiga wherePoints($value)
 * @method static Builder|DritteLiga whereTakengoals($value)
 * @method static Builder|DritteLiga whereTeamId($value)
 * @method static Builder|DritteLiga whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class DritteLiga extends Model
{
    protected $table= 'dritte_liga';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
