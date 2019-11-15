<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Game
 *
 * @property int $id
 * @property int $matchday
 * @property Carbon $date
 * @property string $time
 * @property int $home
 * @property int $guest
 * @property int $homegoals
 * @property int $guestgoals
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Team $guestteams
 * @property-read Team $hometeams
 * @method static Builder|Game newModelQuery()
 * @method static Builder|Game newQuery()
 * @method static Builder|Game query()
 * @method static Builder|Game whereCreatedAt($value)
 * @method static Builder|Game whereDate($value)
 * @method static Builder|Game whereGuest($value)
 * @method static Builder|Game whereGuestgoals($value)
 * @method static Builder|Game whereHome($value)
 * @method static Builder|Game whereHomegoals($value)
 * @method static Builder|Game whereId($value)
 * @method static Builder|Game whereMatchday($value)
 * @method static Builder|Game whereTime($value)
 * @method static Builder|Game whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Game extends Model
{
    //
    protected $dates=['date'];
    protected $table = 'games';
    protected $fillable=['matchday', 'date','time', 'home','guest','homegoals','guestgoals'];

    public function hometeams()
    {
        return $this->belongsTo(Team::class,'home');
    }

    public function guestteams()
    {
        return $this->belongsTo(Team::class, 'guest');
    }

    public function gastname(){
        /** @var Team $team */
        $team = Team::query()->where('id','=',$this->guest)->first();
        return $team->teamname;
    }
    public function homename(){
        /** @var Team $team */
        $team = Team::query()->where('id','=',$this->home)->first();
        return $team->teamname;
    }

}
