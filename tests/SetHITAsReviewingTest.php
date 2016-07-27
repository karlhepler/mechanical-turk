<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class SetHITAsReviewingTest extends OperationTestCase
{
    /**
     * @expectedException OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException
     */
    public function testSubmit()
    {
        $data = [
            'HITId' => 123,
        ];

        $response = $this->requester()->setHITAsReviewing($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
