<?php
namespace App\Services;

use App\Game;
class MatchService
{
    public function gegner()
    {
        return Game::where('id');
    }
    public function homegoals($home_id)
    {
        $home = Game::whereHome($home_id)->value('homegoals');
        return $home;
    }
    public function guestgoals($guest_id)
    {
        $guest = Game::whereGuest($guest_id)->value('guestgoals');
        return $guest;
    }
}
