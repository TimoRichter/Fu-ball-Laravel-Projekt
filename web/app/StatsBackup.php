<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatsBackup extends Model
{
    protected $table= 'stats_backup';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];


    public function teams_backup(){
        return $this->belongsTo(Team::class, 'team_id' );
    }

    public function stats_merge(){
        return$this->belongsTo('App\Stat','team_id');
    }
}
