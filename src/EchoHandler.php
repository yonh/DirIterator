<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午7:12
 */
class EchoHandler implements DirIteratorHandler
{

    /**
     * @param $spl SplFileInfo
     */
    public function handle($spl)
    {
        echo $spl;
    }
}