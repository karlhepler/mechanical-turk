<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class CreateHITTest extends OperationTestCase
{
    public function testSubmit()
    {
        $response = $this->requester()->createHIT($this->hitData());

        $this->assertInstanceOf(Response::class, $response);
    }
}
