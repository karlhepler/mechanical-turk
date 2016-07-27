<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class GetReviewableHITsTest extends OperationTestCase
{
    public function testSubmit()
    {
        $response = $this->requester()->getReviewableHITs()->submit();

        $this->assertInstanceOf(Response::class, $response);
    }
}
