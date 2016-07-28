<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The GetHIT operation retrieves the details of the specified HIT.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetHITOperation.html
 */
class GetHIT extends Base\Operation
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
            'HITId',
        ]);
    }
}
