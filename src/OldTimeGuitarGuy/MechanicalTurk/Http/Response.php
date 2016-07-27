<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Http;

use Psr\Http\Message\ResponseInterface;
use OldTimeGuitarGuy\MechanicalTurk\Contracts\Http\Response as ResponseContract;

class Response implements ResponseContract
{
    /**
     * The response status code
     *
     * @var integer
     */
    protected $status;

    /**
     * The response content
     *
     * @var \stdClass
     */
    protected $content;

    /**
     * Create a new instance of Mechanical Turk response
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->status = $response->getStatusCode();
        $this->content = new \SimpleXmlElement($response->getBody()->getContents());
    }

    /**
     * Get the status code
     *
     * @return integer
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Determine if the response is valid
     *
     * @return boolean
     */
    public function isValid()
    {
        return count($this->content->xpath('//Request[IsValid="True"]')) > 0;
    }

    /**
     * Directly reference the content object
     *
     * @param  string $value
     *
     * @return mixed
     */
    public function __get($value)
    {
        return $this->content->{$value};
    }

    /**
     * The string representation of the response
     *
     * @return string
     */
    public function __toString()
    {
        return $this->content->asXML();
    }
}
