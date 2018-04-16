<?php
namespace Algorithms\UnionFind;

class UnionFind
{
    private $target = [];

    public function union($a, $b)
    {
        $aPath = $this->target[$a];
        $bPath = $this->target[$b];

        for ($i = 0; $i < count($this->target); $i++) {
            if ($this->target[$i] === $aPath) {
                $this->target[$i] = $bPath;
            }
        }
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    public function connected($a, $b): bool
    {
        return $this->target[$a] === $this->target[$b];
    }

    public function find($a)
    {
    }

    public function count()
    {
    }

    /**
     * @param int $target
     */
    public function setTarget(int $target)
    {
        for ($i = 0; $i < $target; $i++) {
            $this->target[$i] = $i;
        }
    }

    public function getTarget()
    {
        return $this->target;
    }
}
