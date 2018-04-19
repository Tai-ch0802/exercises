<?php
namespace Algorithms\UnionFind;

class QuickUnionImprovement
{
    private $target = [];

    /**
     * @param $a
     * @param $b
     */
    public function union($a, $b): void
    {
        $aParent = $this->target[$a];
        $bParent = $this->target[$b];

        do {
            $aParent = $this->target[$aParent];
        } while ($aParent !== $this->target[$aParent]);

        do {
            $bParent = $this->target[$bParent];
        } while ($bParent !== $this->target[$bParent]);

        if ($bParent > $this->target[$aParent]) {
            $this->target[$aParent] = $bParent;
        } else {
            $this->target[$bParent] = $aParent;
        }
    }

    /**
     * @param $a
     * @param $b
     * @return bool
     */
    public function connected($a, $b): bool
    {
        $aParent = $this->target[$a];
        $bParent = $this->target[$b];

        do {
            $aParent = $this->target[$aParent];
        } while ($aParent !== $this->target[$aParent]);

        do {
            $bParent = $this->target[$bParent];
        } while ($bParent !== $this->target[$bParent]);


        return $aParent === $bParent;
    }

    /**
     * To find the biggest
     * @param $a
     * @return mixed
     */
    public function find($a)
    {
        $aParent = $this->target[$a];

        do {
            $aParent = $this->target[$aParent];
        } while ($aParent !== $this->target[$aParent]);

        return $aParent;
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
