<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Operations;

/**
 * The GetAccountBalance operation retrieves the amount of money in your Amazon Mechanical Turk account.
 *
 * http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetAccountBalanceOperation.html
 */
class GetAccountBalance extends Base\Operation
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
        return true;
    }
}
