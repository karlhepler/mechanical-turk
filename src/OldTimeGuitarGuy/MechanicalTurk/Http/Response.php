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
    private $status;

    /**
     * The response content
     *
     * @var string
     */
    private $content;

    /**
     * Determines whether or not the response is valid
     *
     * @var boolean
     */
    private $isValid;

    /**
     * The SimpleXMLElement representation of the content
     *
     * @var \SimpleXMLElement
     */
    private $xml;

    /**
     * The json representation of the content
     *
     * @var \stdClass
     */
    private $json;

    /**
     * Create a new instance of Mechanical Turk response
     *
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->status = $response->getStatusCode();
        $this->content = $response->getBody()->getContents()
            ?: '<empty status="'.$this->status().'"></empty>';
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
        if (! isset($this->isValid)) {
            $this->isValid = count($this->xml()->xpath('//Request[IsValid="True"]')) > 0;
        }

        return $this->isValid;
    }

    /**
     * Get the simple xml representation of the content
     *
     * @return \SimpleXmlElement
     */
    public function xml()
    {
        if (! isset($this->xml)) {
            $this->xml = new SimpleXmlElement($this->content);
        }

        return $this->xml;
    }

    /**
     * Get the json representation of the content
     *
     * @param  boolean $isArray
     * @return \stdClass
     */
    public function json($isArray = false)
    {
        if (! isset($this->json)) {
            $this->json = json_decode(json_encode($this->xml()), $isArray);
        }

        return $this->json;
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
        return $this->json()->{$value};
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
