<?php

namespace OldTimeGuitarGuy\MechanicalTurk;

use OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkOperationException;

/**
 * The main entry point for the API Client.
 * 
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/Welcome.html
 */
class Requester implements Contracts\Requester
{
    /**
     * Supported operations
     *
     * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_OperationsArticle.html
     *
     * @var array
     */
    protected $operations = [
        'getHIT' => Operations\GetHIT::class,
        'createHIT' => Operations\CreateHIT::class,
        'blockWorker' => Operations\BlockWorker::class,
        'unblockWorker' => Operations\UnblockWorker::class,
        'registerHITType' => Operations\RegisterHITType::class,
        'rejectAssignment' => Operations\RejectAssignment::class,
        'approveAssignment' => Operations\ApproveAssignment::class,
        'getAccountBalance' => Operations\GetAccountBalance::class,
        'getReviewableHITs' => Operations\GetReviewableHITs::class,
        'setHITAsReviewing' => Operations\SetHITAsReviewing::class,
        'getAssignmentsForHIT' => Operations\GetAssignmentsForHIT::class,
        'getReviewResultsForHIT' => Operations\GetReviewResultsForHIT::class,
        'approveRejectedAssignment' => Operations\ApproveRejectedAssignment::class,
    ];

    /**
     * The Mechanical Turk request object
     *
     * @var Contracts\Http\Request
     */
    protected $request;

    /**
     * Determine if it should retry
     * after receiving a rate limit error.
     *
     * @var boolean
     */
    protected $retryOnRateLimit = false;

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
     *
     * @throws \BadMethodCallException
     */
    public function make($operation, array $parameters = [])
    {
        if (! isset($this->operations[$operation])) {
            throw new \BadMethodCallException("{$operation} is not a supported Mechanical Turk Requester operation.");
        }
        
        return new $this->operations[$operation]($this->request, $parameters, $this->retryOnRateLimit);
    }

    /**
     * Submit an operation request
     *
     * @param  string $operation
     * @param  array  $parameters
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    public function submit($operation, array $parameters = [])
    {
        return $this->make($operation, $parameters)->submit();
    }

    /**
     * Set whether or not it should retry
     * if it encounters a rate limit error
     *
     * @param  boolean $shouldRetry
     * @return $this
     */
    public function setRetryOnRateLimit($shouldRetry)
    {
        $this->retryOnRateLimit = $shouldRetry;
        return $this;
    }

    /**
     * Dynamically submit an operation
     *
     * @param  string $method
     * @param  array  $arguments
     * 
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($method, array $arguments)
    {
        return $this->submit($method, isset($arguments[0]) ? $arguments[0] : []);
    }
}
