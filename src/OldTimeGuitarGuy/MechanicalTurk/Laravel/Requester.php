<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Laravel;

use Illuminate\Support\Facades\Facade;
use OldTimeGuitarGuy\MechanicalTurk\Requester;

/**
 * @see \OldTimeGuitarGuy\MechanicalTurk\Requester
 */
class RequesterFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Requester::class;
    }
}
