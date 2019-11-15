<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeTableZweiteLiga extends Model
{
    protected $table= 'home_table_zweite_liga';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
