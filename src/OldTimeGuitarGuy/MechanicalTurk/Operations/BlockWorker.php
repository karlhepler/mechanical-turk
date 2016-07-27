<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The BlockWorker operation allows you to prevent a Worker from working on your HITs.
 * For example, you can block a Worker who is producing poor quality work. You can block up to 100,000 Workers.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_BlockWorkerOperation.html
 */
class BlockWorker extends Base\Operation
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
            'Reason',
        ]);
    }
}
