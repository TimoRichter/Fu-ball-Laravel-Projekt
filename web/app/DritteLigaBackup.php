<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DritteLigaBackup extends Model
{
    protected $table= 'dritte_liga_backup';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
