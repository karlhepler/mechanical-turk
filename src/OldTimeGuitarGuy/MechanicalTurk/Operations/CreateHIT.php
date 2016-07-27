<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The CreateHIT operation creates a new Human Intelligence Task (HIT).
 * The new HIT is made available for Workers to find and accept on the Amazon Mechanical Turk website.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_CreateHITOperation.html
 */
class CreateHIT extends Base\Operation
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
        if (isset($parameters['HITTypeId'])) {
            return $this->isSetOn($parameters, [
                'LifetimeInSeconds',
            ], [
                'Question',
                'HITLayoutId',
            ]);
        }

        return $this->isSetOn($parameters, [
            'Title',
            'Description',
            'Reward',
            'AssignmentDurationInSeconds',
            'LifetimeInSeconds',
        ], [
            'Question',
            'HITLayoutId',
        ]);
    }
}
