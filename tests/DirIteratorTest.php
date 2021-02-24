<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午5:40
 */
class DirIteratorTest extends \PHPUnit\Framework\TestCase
{
    public function testDirIterator()
    {
        $iter = new DirIterator();
        $iter->addHandler(new PrintHandler());
        $iter->addHandler(new EchoHandler());

        $iter->iterator(__DIR__);

        $this->expectOutputRegex('/DirIteratorTest\.php/');
    }
}
