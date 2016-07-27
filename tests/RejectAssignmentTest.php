<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class RejectAssignmentTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'AssignmentId' => 123,
        ];

        $response = $this->requester()->rejectAssignment($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
