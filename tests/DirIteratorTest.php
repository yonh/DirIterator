<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午5:40
 */
class DirIteratorTest extends PHPUnit_Framework_TestCase
{
    public function testDirIterator() {
        $iter = new DirIterator();
        $iter->addHandle(new PrintHandle());
        $iter->addHandle(new EchoHandle());

        $iter->iterator(__DIR__);
    }
}
