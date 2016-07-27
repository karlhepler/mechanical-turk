<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Http;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Request as RequestContract;
use OldTimeGuitarGuy\MechanicalTurk\Exceptions\MechanicalTurkRequestException;

class Request implements RequestContract
{
    /**
     * The http client
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $http;

    /**
     * The Requester's Access Key ID, a unique identifier
     * that corresponds to a Secret Access Key and an Amazon.com account.
     *
     * @var string
     */
    protected $accessKeyId;

    /**
     * The Requester's AWS secret
     *
     * @var string
     */
    protected $secretAccessKey;

    /**
     * Determines if we should use the sandbox uri
     *
     * @var boolean
     */
    protected $useSandbox;

    /**
     * The current timestamp of the request
     *
     * @var string
     */
    protected $timestamp;

    /**
     * Create a new instance of Mechanical Turk Requester API Client Request
     *
     * @param ClientInterface $http
     * @param string          $accessKeyId
     * @param string          $secretAccessKeyId
     * @param boolean         $useSandbox
     */
    public function __construct(ClientInterface $http, $accessKeyId, $secretAccessKey, $useSandbox = true)
    {
        $this->http = $http;
        $this->accessKeyId = $accessKeyId;
        $this->secretAccessKey = $secretAccessKey;
        $this->useSandbox = $useSandbox;
    }

    ////////////////////
    // PUBLIC METHODS //
    ////////////////////

    /**
     * Make a GET request to the API
     *
     * @param  string $operation
     * @param  array  $parameters
     *
     * @return \OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response
     */
    public function get($operation, array $parameters)
    {
        try {
            return new Response(
                $this->http->request('GET', $this->base(), [
                    'query' => array_merge($parameters, [
                        'Service' => self::SERVICE,
                        'AWSAccessKeyId' => $this->accessKeyId,
                        'Version' => self::VERSION,
                        'Operation' => $operation,
                        'Signature' => $this->signature($operation),
                        'Timestamp' => $this->timestamp(),
                    ])
                ])
            );
        }
        catch(BadResponseException $e) {
            throw new MechanicalTurkRequestException(new Response($e->getResponse()));
        }
    }

    ///////////////////////
    // PROTECTED METHODS //
    ///////////////////////

    /**
     * Get the base uri for the request
     *
     * @return string
     */
    protected function base()
    {
        return $this->useSandbox
            ? self::SANDBOX_URI
            : self::PRODUCTION_URI;
    }

    /**
     * Get the Request signature
     *
     * @param  string $operation
     *
     * @return string
     */
    protected function signature($operation)
    {
        $data = self::SERVICE . $operation . $this->timestamp();
        return base64_encode(hash_hmac(MHASH_SHA1, $data, $this->secretAccessKey));
    }

    /**
     * Get the current timestamp of the request
     *
     * @return string
     */
    protected function timestamp()
    {
        if (isset($this->timestamp)) {
            return $this->timestamp;
        }

        return $this->timestamp = gmdate('Y-m-d\TH:i:s\Z');
    }
}
