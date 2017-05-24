<?php

/**
 *
 * User: 赖永恒
 * Date: 17-5-24
 * Time: 下午5:37
 */
class DirIterator
{
    private $handleList = array();

    /**
     * @param $spl SplFileInfo
     */
    private function handle($spl)
    {
        /** @var DirIteratorHandle $handle */
        foreach ($this->handleList as $handle) {
            $handle->handle($spl);
        }
    }

    public function iterator($dir)
    {
        $iterator = new \RecursiveDirectoryIterator($dir);

        /** @var SplFileInfo $spl */
        foreach ($iterator as $spl) {
            $name = $spl->getFilename();

            if ($name == "." || $name == "..") continue;

            $this->handle($spl);

            if ($spl->isDir()) {
                $this->iterator($spl->getRealPath());
            }
        }
    }

    /**
     * @param $handle DirIteratorHandle
     */
    public function addHandle($handle)
    {
        $this->handleList[] = $handle;
    }

}