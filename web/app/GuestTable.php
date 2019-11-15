<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GuestTable extends Model
{
    protected $table= 'guest_table';
    protected $fillable = ['team_id', 'wins', 'ties', 'loses' , 'points', 'goals', 'takengoals', 'playedgames','winrate'];

    public function teams(){
        return $this->belongsTo(Team::class, 'team_id' );
    }
}
