<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The GetAssignmentsForHIT operation retrieves completed assignments for a HIT.
 * You can use this operation to retrieve the results for a HIT.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetAssignmentsForHITOperation.html
 */
class GetAssignmentsForHIT extends Base\Operation
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
