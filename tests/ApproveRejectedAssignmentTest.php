<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class ApproveRejectedAssignmentTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'AssignmentId' => 123,
        ];

        $response = $this->requester()->approveRejectedAssignment($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
