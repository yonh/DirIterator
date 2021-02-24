<?php

/**
 *
 * 目录遍历器,通过目录遍历器遍历目录,传入文件处理类,方便实现针对遍历文件处理
 *
 *
 * 一个简单的例子, 遍历当前目录,并输出所有.php的文件,首先你得有个处理类EchoPHPFileNameHandle
 * // 调用示例
 * $handler = new EchoPHPFileNameHandler();
 * $iter = new DirIterator();
 * $iter->addHandler($handler);
 * $iter->iterator(__DIR__);
 *
 * class EchoPHPFileNameHandle implements DirIteratorHandler
 * {
 *     public function handle($spl)
 *     {
 *       $ext = ".php";
 *       $pos = strpos($spl->getRealPath(), $ext);
 *         if ($pos !== false && $pos + strlen($ext) == strlen($spl->getRealPath())) {
 *             echo $spl->getRealPath() . PHP_EOL;
 *         }
 *     }
 * }
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
        /** @var DirIteratorHandler $handle */
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
     * @param $handle DirIteratorHandler
     */
    public function addHandler($handle)
    {
        $this->handleList[] = $handle;
    }

}
