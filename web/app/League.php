<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\League
 *
 * @property int $id
 * @property string $association
 * @property Carbon $firstgame
 * @property string|null $winner
 * @property string|null $recordplayer
 * @property string $recordplayergames
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Player[] $players
 * @property-read int|null $players_count
 * @property-read Collection|Team[] $teams
 * @property-read int|null $teams_count
 * @method static Builder|League newModelQuery()
 * @method static Builder|League newQuery()
 * @method static Builder|League query()
 * @method static Builder|League whereAssociation($value)
 * @method static Builder|League whereCreatedAt($value)
 * @method static Builder|League whereFirstgame($value)
 * @method static Builder|League whereId($value)
 * @method static Builder|League whereRecordplayer($value)
 * @method static Builder|League whereRecordplayergames($value)
 * @method static Builder|League whereUpdatedAt($value)
 * @method static Builder|League whereWinner($value)
 * @mixin Eloquent
 */
class League extends Model
{
    //

    protected $dates=['firstgame'];
    protected $table = 'leagues';
    protected $fillable =['association', 'firstgame','winner', 'recordplayer', 'recordplayergames'];

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function winnername(){
        /** @var Team $team */
        $team = Team::query()->where('id','=',$this->winner)->first();
        return $team->teamname;
    }
}
