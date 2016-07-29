<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Exceptions;

class MechanicalTurkOperationException extends \Exception
{
    /**
     * A list of the documentation resources
     *
     * @var array
     */
    protected $documentation = [
        'CreateHIT' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_CreateHITOperation.html',
        'GetReviewableHITs' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetReviewableHITsOperation.html',
        'RegisterHITType' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_RegisterHITTypeOperation.html',
        'GetAssignmentsForHIT' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetAssignmentsForHITOperation.html',
        'SetHITAsReviewing' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_SetHITAsReviewingOperation.html',
        'ApproveAssignment' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_ApproveAssignmentOperation.html',
        'ApproveRejectedAssignment' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_ApproveRejectedAssignmentOperation.html',
        'BlockWorker' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_BlockWorkerOperation.html',
        'UnblockWorker' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_UnblockWorkerOperation.html',
        'RejectAssignment' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_RejectAssignmentOperation.html',
        'GetHIT' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetHITOperation.html',
        'GetReviewResultsForHIT' => 'http://docs.aws.amazon.com/AWSMechTurk/latest/AWSMturkAPI/ApiReference_GetReviewResultsForHitOperation.html',
    ];

    /**
     * Create a new instance of MechanicalTurkOperationException
     *
     * @param string $operation
     */
    public function __construct($operation)
    {
        // Construct the message
        $message = "The provided parameters do not satisfy the minimum requirements of {$operation}.".PHP_EOL;
        $message .= "Please reference the documentation for more information.".PHP_EOL;
        $message .= $this->documentation[$operation];

        // Call the parent
        parent::__construct($message);
    }
}
