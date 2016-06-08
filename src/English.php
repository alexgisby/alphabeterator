<?php

namespace Alphabeterator;

/**
 * Class English
 *
 * This is the class to fill in and make an Array-like thing.
 *
 * Hint: you need to implement three interfaces: \Countable, \ArrayAccess and \Iterator
 */
class English implements \Countable, \ArrayAccess, \Iterator
{
    private $alphabet = null;

    function __construct() {
        $this->alphabet = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
    }

    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->alphabet[] = $value;
        } else {
            $this->alphabet[$offset] = $value;
        }
    }

    public function offsetExists($offset)
    {
        return isset($this->alphabet[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->alphabet[$offset]);
    }

    public function offsetGet($offset)
    {
        return isset($this->alphabet[$offset]) ? $this->alphabet[$offset] : null;
    }

    public function rewind() {
        reset($this->alphabet);
    }

    public function current() {
        return current($this->alphabet);
    }

    public function key() {
        return key($this->alphabet);
    }

    public function next() {
        return next($this->alphabet);
    }

    public function valid() {
        return $this->current() !== false;
    }

    public function count() {
        return count($this->alphabet);
    }
}