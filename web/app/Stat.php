<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Stat
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
 * @method static Builder|Stat newModelQuery()
 * @method static Builder|Stat newQuery()
 * @method static Builder|Stat query()
 * @method static Builder|Stat whereCreatedAt($value)
 * @method static Builder|Stat whereGoals($value)
 * @method static Builder|Stat whereId($value)
 * @method static Builder|Stat wherePlayedgames($value)
 * @method static Builder|Stat wherePoints($value)
 * @method static Builder|Stat whereTakengoals($value)
 * @method static Builder|Stat whereTeamId($value)
 * @method static Builder|Stat whereUpdatedAt($value)
 * @mixin Eloquent
 */

class Stat extends Model
{
    protected $table= 'stats';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }

    public function gastname(){
        /** @var Team $team */
        $team = Team::query()->where('id','=',$this->team_id)->first();
        return $team->teamname;
    }

    public function compare()
    {
        $stats = Stat::where($this->points)->first();

        foreach ($stats as $stat) {

            /** @var Stat $stat */
            /** @var StatsBackup $stats_backup */

            if ($stat->points > $this->get_points()) {
                $this->standing = "up";
            }
            if ($stat->points = $this->get_points()) {
                $this->standing = "stay";
            }
            if ($stat->points < $this->get_points()) {
                $this->standing = "down";
            }
        }
    }

}
