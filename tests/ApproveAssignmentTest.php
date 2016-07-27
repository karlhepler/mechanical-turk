<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class ApproveAssignmentTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'AssignmentId' => 123,
        ];

        $response = $this->requester()->approveAssignment($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
