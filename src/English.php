<?php

namespace Alphabeterator;

/**
 * Class English
 */
class English implements \Countable, \ArrayAccess, \Iterator
{
    /* ------------- Implement Countable ------------------ */

    public function count()
    {
        return 26;
    }

    /* ------------- Implement ArrayAccess ----------------- */

    public function offsetExists($offset)
    {
        return (is_int($offset) && $offset >= 0 && $offset < 26);
    }

    public function offsetGet($offset)
    {
        // This is the magic bit, by relying on the ASCII character set having the English alphabet in order
        // numerically, we can avoid creating the entire alphabet in memory, and simply return the character
        // by adding 97 (the start of the English alphabet) to the current offset.
        // 97 = a
        // 98 = b
        // 99 = c etc etc
        
        return chr(97+$offset);
    }

    public function offsetSet($offset, $value)
    {
        // Does nothing, you can't change the alphabet!
    }

    public function offsetUnset($offset)
    {
        // Does nothing, you can't change the alphabet!
    }

    /* ----------- Implement Iterator ---------------------- */

    /**
     * @var int     This variable is to keep track of the current position within the iterator we are.
     */
    protected $position = 0;

    public function current()
    {
        // Notice how this function can make use of the ArrayAccess's offsetGet() rather than
        // reimplementing the getter functionality:
        return $this->offsetGet($this->position);
    }

    public function next()
    {
        $this->position ++;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return $this->offsetExists($this->position);
    }

    public function rewind()
    {
        $this->position = 0;
    }


}