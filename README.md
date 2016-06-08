# Alphabeterator

Tutorial on PHP's ArrayAccess, Countable and Iterator interfaces.

## Setup

1. Check out this repo
2. From within the repo, run `$ composer install`

## Tasks

1. On the `English` class, implement the [Countable](http://php.net/countable) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testCount`
2. On the `English` class, implement the [ArrayAccess](http://php.net/arrayaccess) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testOffset`
3. On the `English` class, implement the [Iterator](http://php.net/iterator) interface. Verify that your implementation
works by running `$ ./vendor/bin/phpunit --filter testIterator`
4. Verify that everything works by running `$ ./vendor/bin/phpunit`

## Bonus

- Implement a new Alphabeterator class that represents the Greek alphabet
- Implement a function on the English class that transforms the array into uppercase

## Solution

OK, since you're on the solution branch, you can see it in action in the `src/English.php` file.

This solution deliberately does something a little clever. One correct solution would be to do this:

```php
<?php

namespace Alphabeterator;

/**
 * Class English
 */
class English implements \Countable, \ArrayAccess, \Iterator
{
    protected $letters = [
        'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
        'v', 'w', 'x', 'y', 'z'
    ];

    /* ------------- Implement Countable ------------------ */

    public function count()
    {
        return count($this->letters);
    }

    /* ------------- Implement ArrayAccess ----------------- */

    public function offsetExists($offset)
    {
        return array_key_exists($offset, $this->letters);
    }

    public function offsetGet($offset)
    {
        return $this->letters[$offset];
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
```

It works and passes the tests, however it's a bit inefficient; we're creating 26 strings in memory when in reality we
might not need them.

Instead, the solution in the src/ folder demonstrates how Array-like objects in PHP can present themselves like an array
but internally not have an array at all! The solution uses a bit of ASCII maths to simply calculate the correct string
based on offsets.

This works great for English, but probably wouldn't for other languages. But it does highlight the power of these interfaces;
you can implement the most efficient solution for your data set, with no demand on the internal data structure!
