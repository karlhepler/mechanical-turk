<?php

namespace OldTimeGuitarGuy\MechanicalTurk;

/**
 * The main entry point for the API Client.
 * 
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/Welcome.html
 */
class Requester
{
    /**
     * Supported operations
     *
     * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_OperationsArticle.html
     *
     * @var array
     */
    protected $operations = [
        'createHIT' => Operations\CreateHIT::class,
    ];

    /**
     * Instance cache
     *
     * @var array
     */
    protected $instances = [];

    /**
     * The http request object
     *
     * @var Contracts\Http\Request
     */
    protected $request;
}
