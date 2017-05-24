<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午7:09
 */
interface DirIteratorHandle
{
    /**
     * @param $spl SplFileInfo */
    public function handle($spl);
}