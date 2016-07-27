<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The ApproveAssignment operation approves the results of a completed assignment.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_ApproveAssignmentOperation.html
 */
class ApproveAssignment extends Base\Operation
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
