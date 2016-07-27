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
