<?php


namespace App;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Mitarbeiter
 *
 * @method static Builder|Mitarbeiter newModelQuery()
 * @method static Builder|Mitarbeiter newQuery()
 * @method static Builder|Mitarbeiter query()
 * @mixin \Eloquent
 */
class Mitarbeiter /*<--ist die Klasse*/ extends Model //<--Elternklasse vom Mitarbeiter
{
    public $name; //<--Attribut vom Mitarbeiter

    public function nameAusgeben() //<--function vom Mitarbeiter
    {
        echo $this->name;
    }
}
$timo = new Mitarbeiter(); //
$maxi = new Mitarbeiter();// <-- $timo und $maxi sind instanzen vom Mitarbeiter
$maxi->name='maxi'; // Wertzuweisung vom Attribut
$maxi->nameAusgeben(); //die function nameAusgeben() wird hier für die $maxi Instanz aufgerufen
