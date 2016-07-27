<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The SetHITAsReviewing operation accepts parameters common to all operations.
 * Some common parameters are required. See Common Parameters for more information.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_SetHITAsReviewingOperation.html
 */
class SetHITAsReviewing extends Base\Operation
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
