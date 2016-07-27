<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class BlockWorkerTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'WorkerId' => 123,
            'Reason' => 'No Reason',
        ];

        $response = $this->requester()->blockWorker($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
