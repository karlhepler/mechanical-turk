<?php

namespace OldTimeGuitarGuy\MechanicalTurk;

use OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkOperationException;

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
     * The Mechanical Turk request object
     *
     * @var Contracts\Http\Request
     */
    protected $request;

    /**
     * Create a new instance of Mechanical Turk Requester API Client.
     * 
     * @param   Contracts\Http\Request $request
     */
    public function __construct(Contracts\Http\Request $request)
    {
        $this->request = $request;
    }

    /**
     * Return an instance of the given operation
     *
     * @param  string $operation
     * @param  array $parameters
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Operations\Base\Operation
     */
    public function make($operation, array $parameters)
    {
        try {
            return new $this->operations[$operation]($this->request, $parameters);
        }
        catch (MechanicalTurkOperationException $e) {
            throw $e;
        }
        catch (\Exception $e) {
            throw new \BadMethodCallException("{$operation} is not a supported Mechanical Turk Requester operation.");
        }
    }

    /**
     * Dynamically call an operation
     *
     * @param  string $method
     * @param  array  $arguments
     * 
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($method, array $arguments)
    {
        return $this->make($method, $arguments[0]);
    }
}
