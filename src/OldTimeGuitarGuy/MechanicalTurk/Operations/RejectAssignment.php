<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The RejectAssignment operation rejects the results of a completed assignment.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_RejectAssignmentOperation.html
 */
class RejectAssignment extends Base\Operation
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
            'AssignmentId',
        ]);
    }
}
