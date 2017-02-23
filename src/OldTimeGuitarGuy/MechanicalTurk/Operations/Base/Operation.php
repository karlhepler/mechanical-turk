<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations\Base;

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Request;
use OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException;
use OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkOperationException;

abstract class Operation
{
    /**
     * The Mechanical Turk request object
     *
     * @var \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Request
     */
    protected $request;

    /**
     * The parameters passed to the Mechanical Turk request
     *
     * @var array
     */
    protected $parameters;

    /**
     * Determine if it should retry
     * after receiving a rate limit error.
     *
     * @var boolean
     */
    protected $retryOnRateLimit;

    /**
     * Create new instance of CreateHIT
     *
     * @param Request $request
     * @param array   $parameters
     * @param boolean $retryOnRateLimit
     *
     * @throws \OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkOperationException
     */
    public function __construct(Request $request, array $parameters, $retryOnRateLimit = false)
    {
        if (! $this->satisfiesRequirements($parameters)) {
            throw new MechanicalTurkOperationException($this->operation());
        }

        $this->request = $request;
        $this->parameters = $parameters;
        $this->retryOnRateLimit = $retryOnRateLimit;
    }

    //////////////////////
    // ABSTRACT METHODS //
    //////////////////////

    /**
     * Determine if the given parameters satisfy this operation's requirements
     *
     * @param  array  $parameters
     *
     * @return boolean
     */
    abstract protected function satisfiesRequirements(array $parameters);

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Submit the request to the Mechanical Turk Requester API
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     * @throws \OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function submit()
    {
        try {
            return $this->request->post($this->operation(), $this->parameters);
        } catch (MechanicalTurkRequestException $e) {
            if ($this->retryOnRateLimit && $e->response()->status() === 503) {
                sleep(30);
                return $this->request->post($this->operation(), $this->parameters);
            }

            throw $e;
        }
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Determine if the given keys are set on the given entity
     *
     * @param  array   $entity
     * @param  array   $keys
     *
     * @return boolean
     */
    protected function isSetOn(array $entity, array $keys)
    {
        foreach ($keys as $key) {
            // It's an array - at least ONE of the keys must exist
            if (is_array($key)) {
                foreach ($key as $orKey) {
                    // We can stop checking if one is set
                    if (isset($entity[$orKey])) {
                        break;
                    }
                    // None are set! Return false!
                    return false;
                }
            }
            // It's not an array - so make sure it's there
            elseif (! isset($entity[$key])) {
                return false;
            }
        }

        // Everything is good!
        return true;
    }

    /////////////////////
    // PRIVATE METHODS //
    /////////////////////

    /**
     * Return the name of the current operation
     *
     * @return string
     */
    private function operation()
    {
        preg_match('/\\\(\w+)$/', static::class, $operation);
        return $operation[1];
    }
}
