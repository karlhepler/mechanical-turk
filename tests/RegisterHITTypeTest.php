<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class RegisterHITTypeTest extends OperationTestCase
{
    public function testSubmit()
    {
        $data = [
            'Title' => 'Test Title '.time(),
            'Description' => 'Test Description',
            'Question' => file_get_contents(__DIR__.'/helpers/TestQuestion.xml'),
            'Reward' => [
                'Amount' => 0.3,
                'CurrencyCode' => 'USD',
            ],
            'AssignmentDurationInSeconds' => 60*10,
        ];

        $response = $this->requester()->registerHITType($data)->submit();

        $this->assertInstanceOf(Response::class, $response);
    }
}
