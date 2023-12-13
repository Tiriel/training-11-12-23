<?php

namespace Tests\Heap;

use App\Heap\MemberAgeHeap;
use App\Heap\MemberHeap;
use App\User\Member;
use PHPUnit\Framework\TestCase;

class MemberAgeHeapTest extends TestCase
{
    public function testMemberAgeHeapInsertThrowsOnNonMemberParameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(MemberHeap::class." only acceptes instances of the Member class (int given).");

        $heap = new MemberAgeHeap();
        $heap->insert(123);
    }

    public function testCompareCallsMemberGetAge()
    {
        $m1 = $this->getMockBuilder(Member::class)
            ->setConstructorArgs(['Bob', '1234', 35])
            ->onlyMethods(['getAge'])
            ->getMock();
        $m1->expects($this->once())->method('getAge')->willReturn(35);

        $m2 = $this->getMockBuilder(Member::class)
            ->setConstructorArgs(['Tom', '1234', 24])
            ->onlyMethods(['getAge'])
            ->getMock();
        $m2->expects($this->once())->method('getAge')->willReturn(24);

        $heap = new MemberAgeHeap();
        $heap->insert($m1);
        $heap->insert($m2);
    }
}
