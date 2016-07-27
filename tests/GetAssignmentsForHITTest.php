<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class GetAssignmentsForHITTest extends OperationTestCase
{
    public function testSubmit()
    {
        $data = [
            'HITId' => (string)$this->requester()->createHIT($this->hitData())->HIT->HITId,
        ];

        $response = $this->requester()->getAssignmentsForHIT($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
