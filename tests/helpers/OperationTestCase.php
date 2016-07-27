<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use OldTimeGuitarGuy\MechanicalTurk\Requester;
use OldTimeGuitarGuy\MechanicalTurk\Http\Request;

class OperationTestCase extends TestCase
{
    /**
     * Singleton instance of requester
     *
     * @var \OldTimeGuitarGuy\MechanicalTurk\Requester
     */
    private static $requester;

    /**
     * Get the singleton instance of the requester
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Requester
     */
    protected function requester()
    {
        if (isset(self::$requester)) {
            return self::$requester;
        }

        // Get the config
        $config = require_once(__DIR__.'../../../aws_credentials.php');

        // Create the request instance
        $request = new Request(new GuzzleClient, $config['accessKeyId'], $config['secretAccessKey']);

        // Create, save, & return the requester
        return self::$requester = new Requester($request);
    }

    /**
     * Get some test data for creating a hit
     *
     * @return array
     */
    protected function hitData()
    {
        return [
            'Title' => 'Test Title '.time(),
            'Description' => 'Test Description',
            'Question' => file_get_contents(__DIR__.'/TestQuestion.xml'),
            'Reward' => [
                'Amount' => 0.3,
                'CurrencyCode' => 'USD',
            ],
            'AssignmentDurationInSeconds' => 60*10,
            'LifetimeInSeconds' => 60*10,
        ];
    }
}
