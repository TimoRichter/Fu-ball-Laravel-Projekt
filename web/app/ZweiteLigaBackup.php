<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZweiteLigaBackup extends Model
{
    protected $table= 'zweite_liga_backup';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames', 'winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
