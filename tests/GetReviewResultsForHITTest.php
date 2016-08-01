<?php

use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response;

class GetReviewResultsForHITTest extends OperationTestCase
{
    public function testSubmit()
    {
        // Create a hit
        $hit = $this->requester()->createHIT($this->hitData());

        // Setup the query
        $query = [
            'HITId' => (string)$hit->HIT->HITId,
        ];

        // Get the response
        $response = $this->requester()->getReviewResultsForHIT($query);

        // Make sure it's valid
        $this->assertInstanceOf(Response::class, $response);
    }
}
