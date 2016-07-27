<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The ApproveRejectedAssignment operation approves an assignment that was previously rejected.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_ApproveRejectedAssignmentOperation.html
 */
class ApproveRejectedAssignment extends Base\Operation
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
