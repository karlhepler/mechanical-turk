<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Contracts\Http;

interface Request
{
    const SANDBOX_URI = 'https://mechanicalturk.sandbox.amazonaws.com/';
    const PRODUCTION_URI = 'https://mechanicalturk.amazonaws.com/';
    const VERSION = '2014-08-15';
    const SERVICE = 'AWSMechanicalTurkRequester';

    /**
     * Make a GET request to the API
     *
     * @param  string $operation
     * @param  array  $parameters
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    public function get($operation, array $parameters);
}
