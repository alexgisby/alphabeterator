<?php

namespace Alphabeterator\Tests;

use Alphabeterator\English;

class EnglishTest extends \PHPUnit_Framework_TestCase
{
    /* ----------- Testing for Countable ---------------- */

    public function testCount()
    {
        $alpha = new English();
        $this->assertCount(26, $alpha);
    }

    /* ------------- Testing for Array Access --------------------- */

    public function testOffsetGet()
    {
        $alpha = new English();
        $this->assertEquals('a', $alpha[0]);
    }

    public function testOffsetExists()
    {
        $alpha = new English();
        $this->assertTrue(isset($alpha[0]));
        $this->assertTrue(isset($alpha[25]));

        $this->assertFalse(isset($alpha[-1]));
        $this->assertFalse(isset($alpha[26]));
        $this->assertFalse(isset($alpha['hello']));
    }

    /* ------------ Testing Iterator ---------------------- */

    public function testIterator()
    {
        $keys = [];
        $values = '';

        $alpha = new English();
        foreach ($alpha as $key => $value) {
            $keys[] = $value;
            $values .= $value;
        }

        $this->assertEquals(
            [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25],
            $keys
        );
        $this->assertEquals(
            'abcdefghijklmnopqrstuvwxyz',
            $values
        );
    }
}