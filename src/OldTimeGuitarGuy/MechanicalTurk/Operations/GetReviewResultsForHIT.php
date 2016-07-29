<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The GetReviewResultsForHIT operation retrieves the computed results
 * and the actions taken in the course of executing your Review Policies
 * during a CreateHIT operation. For information about how to apply Review
 * Policies when you call CreateHIT, see Review Policies. The GetReviewResultsForHIT
 * operation can return results for both Assignment-level and HIT-level
 * review results. You can also specify to only return results pertaining
 * to a particular Assignment.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetReviewResultsForHitOperation.html
 */
class GetReviewResultsForHIT extends Base\Operation
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
