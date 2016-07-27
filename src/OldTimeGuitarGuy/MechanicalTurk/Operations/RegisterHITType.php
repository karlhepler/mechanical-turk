<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The RegisterHITType operation creates a new HIT type.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_RegisterHITTypeOperation.html
 */
class RegisterHITType extends Base\Operation
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
            'Title',
            'Description',
            'Reward',
            'AssignmentDurationInSeconds',
        ]);
    }
}
