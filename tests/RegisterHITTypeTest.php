<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class RegisterHITTypeTest extends OperationTestCase
{
    public function testSubmit()
    {
        $data = [
            'Title' => 'Test Title '.time(),
            'Description' => 'Test Description',
            'Reward' => [
                'Amount' => 0.3,
                'CurrencyCode' => 'USD',
            ],
            'AssignmentDurationInSeconds' => 60*10,
        ];

        $response = $this->requester()->registerHITType($data);

        $this->assertInstanceOf(Response::class, $response);
    }
}
