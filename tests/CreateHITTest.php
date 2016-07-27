<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class CreateHITTest extends OperationTestCase
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
            'LifetimeInSeconds' => 60*10,
        ];

        $this->assertInstanceOf(
            Response::class,
            $this->requester()->createHIT($data)->submit()
        );
    }
}
