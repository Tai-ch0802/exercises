<?php
namespace Tests\Unit;

use Algorithms\UnionFind\QuickUnionImprovement;
use Tests\TestCase;

class QuickUnionTest extends TestCase
{
    /** @var QuickUnionImprovement */
    private $quickUnionImprovement;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->quickUnionImprovement = new QuickUnionImprovement();
    }

    public function testGetTarget()
    {
        $assertion = 99;

        $this->quickUnionImprovement->setTarget($assertion);

        $this->assertCount($assertion, $this->quickUnionImprovement->getTarget());
    }

    public function testUnion()
    {
        $this->quickUnionImprovement->setTarget(100);

        $this->quickUnionImprovement->union(81, 82);
        $this->quickUnionImprovement->union(83, 84);

        $this->assertFalse($this->quickUnionImprovement->connected(81, 84));

        $this->quickUnionImprovement->union(82, 84);
        $this->assertNotFalse($this->quickUnionImprovement->connected(81, 84));
    }

    public function testAll()
    {
        $target = 1000;
        $start = microtime(true);
        $this->quickUnionImprovement->setTarget($target);

        for ($i = 0; $i < ($target-1); $i++) {
            $this->quickUnionImprovement->union($i, $i+1);
        }
        $end = microtime(true);
        $spent = $end - $start;
        print_r(PHP_EOL . "一千目標測試中，quick-union-improvement花費時間為：{$spent}" . PHP_EOL);
        $this->assertNotFalse($this->quickUnionImprovement->connected(0, $target-1));
    }

    public function testFind()
    {
        $target = 1000;
        $biggest = 543;

        $this->quickUnionImprovement->setTarget($target);

        for ($i = 0; $i < $biggest; $i++) {
            $this->quickUnionImprovement->union($i, $i+1);
        }

        $this->assertEquals($biggest, $this->quickUnionImprovement->find(3));
    }
}
