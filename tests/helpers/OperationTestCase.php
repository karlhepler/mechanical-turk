<?php

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleClient;
use OldTimeGuitarGuy\MechanicalTurk\Requester;
use OldTimeGuitarGuy\MechanicalTurk\Http\Request;

class OperationTestCase extends TestCase
{
    private $requester;

    /**
     * Get the singleton instance of the requester
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Requester
     */
    protected function requester()
    {
        if (isset($this->requester)) {
            return $requester;
        }

        // Get the config
        $config = require_once(__DIR__.'../../../aws_credentials.php');

        // Create the request instance
        $request = new Request(new GuzzleClient, $config['accessKeyId'], $config['secretAccessKey']);

        // Create, save, & return the requester
        return $this->requester = new Requester($request);
    }
}
