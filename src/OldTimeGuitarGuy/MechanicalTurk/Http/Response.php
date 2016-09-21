<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Http;

use SimpleXmlElement;
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
     * Determines whether or not the response is valid
     *
     * @var boolean
     */
    protected $isValid;

    /**
     * Create a new instance of Mechanical Turk response
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->status = $response->getStatusCode();

        $contents = new SimpleXmlElement(
            $response->getBody()->getContents()
            ?: '<empty status="'.$this->status.'"></empty>'
        );

        $this->isValid = count($contents->xpath('//Request[IsValid="True"]')) > 0;

        $this->content = json_decode(json_encode($contents));
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
        return $this->isValid;
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
        return json_encode($this->content);
    }
}
