<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations\Base;

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Request;
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
     * Create new instance of CreateHIT
     *
     * @param Request $request
     * @param array   $parameters
     */
    public function __construct(Request $request, array $parameters)
    {
        if (! $this->satisfiesRequirements($parameters)) {
            throw new MechanicalTurkOperationException($this->operation());
        }

        $this->request = $request;
        $this->parameters = $parameters;
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
     */
    public function submit()
    {
        return $this->request->get($this->operation(), $this->parameters);
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
            if (! isset($entity[$key])) {
                return false;
            }
        }

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
        preg_match('/\\(\w+)$/', static::class, $operation);
        return $operation;
    }
}
