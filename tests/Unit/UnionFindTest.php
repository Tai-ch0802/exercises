<?php
namespace Tests\Unit;

use Algorithms\UnionFind\UnionFind;
use Tests\TestCase;

class UnionFindTest extends TestCase
{
    /** @var UnionFind */
    private $unionFind;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->unionFind = new UnionFind();
    }

    public function testHandle()
    {
        $this->markTestIncomplete('Not finished');
    }

    public function testGetTarget()
    {
        $assertion = 99;

        $this->unionFind->setTarget($assertion);

        $this->assertCount($assertion, $this->unionFind->getTarget());
    }

    public function testUnion()
    {
        $this->unionFind->setTarget(100);

        $this->unionFind->union(81, 82);
        $this->unionFind->union(83, 84);

        $this->assertFalse($this->unionFind->connected(81, 84));

        $this->unionFind->union(82, 84);
        $this->assertNotFalse($this->unionFind->connected(81, 84));
    }
}