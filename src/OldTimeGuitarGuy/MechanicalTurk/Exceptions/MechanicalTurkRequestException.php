<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Exceptions;

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class MechanicalTurkRequestException extends \Exception
{
    /**
     * The Mechanical Turk response that generated this exception
     *
     * @var \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    protected $response;

    /**
     * Create a new instance of MechanicalTurkRequestException
     *
     * @param Response $response
     */
    public function __construct(Response $response)
    {
        parent::__construct($response);

        $this->response = $response;
    }

    /**
     * Get the Mechanical Turk response
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    public function response()
    {
        return $this->response;
    }
}
