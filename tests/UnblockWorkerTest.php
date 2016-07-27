<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class UnblockWorkerTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'WorkerId' => 123,
        ];

        $response = $this->requester()->unblockWorker($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
