<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Exceptions;

class MechanicalTurkOperationException extends \Exception
{
    /**
     * A list of the documentation resources
     *
     * @var array
     */
    protected $documentation = [
        'CreateHIT' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_CreateHITOperation.html',
    ];

    /**
     * Create a new instance of MechanicalTurkOperationException
     *
     * @param string $operation
     */
    public function __construct($operation)
    {
        // Construct the message
        $message = "The provided parameters do not satisfy the requirements of {$operation}.".PHP_EOL;
        $message .= "Please reference the documentation for more information.".PHP_EOL;
        $message .= $this->documentation[$operation];

        // Call the parent
        parent::__construct($message);
    }
}
