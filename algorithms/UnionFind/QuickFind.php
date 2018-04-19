<?php
namespace Algorithms\UnionFind;

class QuickFind
{
    private $target = [];

    /**
     * @param $a
     * @param $b
     */
    public function union($a, $b): void
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

    /**
     * To find the biggest
     * @param $a
     * @return mixed
     */
    public function find($a)
    {
        $max = $this->target[$a];
        for ($i = $max; $i < count($this->target); $i++) {
            if ($this->target[$i] !== $this->target[$a]) {
                continue;
            }
            if ($this->target[$i] > $max) {
                $max = $this->target[$i];
            }
        }
        return $max;
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
