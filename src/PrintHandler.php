<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午7:12
 */
class PrintHandler implements DirIteratorHandler
{

    /**
     * @param $spl SplFileInfo
     */
    public function handle($spl)
    {
        print_r($spl);
    }
}