<?php
/**
 * @Author: Mathieu VIALES
 * @Date:   2016-10-20 16:28:46
 * @Last Modified by:   Mathieu VIALES
 * @Last Modified time: 2016-10-20 16:29:09
 */

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testPushAndPop()
    {
        $stack = [];
        $this->assertEquals(0, count($stack));

        array_push($stack, 'foo');
        $this->assertEquals('foo', $stack[count($stack)-1]);
        $this->assertEquals(1, count($stack));

        $this->assertEquals('foo', array_pop($stack));
        $this->assertEquals(0, count($stack));
    }
}
?>