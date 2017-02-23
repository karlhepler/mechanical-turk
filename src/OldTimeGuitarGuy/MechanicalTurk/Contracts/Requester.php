<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Contracts;

interface Requester
{
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
    public function make($operation, array $parameters = []);

    /**
     * Submit an operation request
     *
     * @param  string $operation
     * @param  array  $parameters
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    public function submit($operation, array $parameters = []);

    /**
     * Set whether or not it should retry
     * if it encounters a rate limit error
     *
     * @param  mixed $shouldRetry
     * @return $this
     */
    public function setRetryOnRateLimit($shouldRetry);

    /**
     * Dynamically submit an operation
     *
     * @param  string $method
     * @param  array  $arguments
     * 
     * @return mixed
     * @throws \BadMethodCallException
     */
    public function __call($method, array $arguments);
}
