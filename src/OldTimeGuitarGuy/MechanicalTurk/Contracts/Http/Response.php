<?php

namespace OldTimeGuitarGuy\MechanicalTurk\Contracts\Http;

interface Response
{
    /**
     * Get the status code
     *
     * @return integer
     */
    public function status();

    /**
     * Determine if the response is valid
     *
     * @return boolean
     */
    public function isValid();

    /**
     * Get the simple xml representation of the content
     *
     * @return \SimpleXmlElement
     */
    public function xml();

    /**
     * Get the json representation of the content
     *
     * @param  boolean $isArray
     * @return \stdClass
     */
    public function json($isArray = false);

    /**
     * Directly reference the content object
     *
     * @param  string $value
     *
     * @return mixed
     */
    public function __get($value);

    /**
     * The string representation of the response
     *
     * @return string
     */
    public function __toString();
}
