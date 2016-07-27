<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The UnblockWorker operation allows you to reinstate a blocked Worker to work on your HITs.
 * This operation reverses the effects of the BlockWorker operation.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_UnblockWorkerOperation.html
 */
class UnblockWorker extends Base\Operation
{
    /**
     * Determine if the given parameters satisfy this operation's requirements
     *
     * @param  array  $parameters
     *
     * @return boolean
     */
    protected function satisfiesRequirements(array $parameters)
    {
        return $this->isSetOn($parameters, [
            'WorkerId',
        ]);
    }
}
