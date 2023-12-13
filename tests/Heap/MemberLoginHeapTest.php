<?php

namespace Tests\Heap;

use App\Heap\MemberHeap;
use App\Heap\MemberLoginHeap;
use App\User\Member;
use PHPUnit\Framework\TestCase;

class MemberLoginHeapTest extends TestCase
{
    public function testMemberLoginHeapInsertThrowsOnNonMemberParameter()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(MemberHeap::class." only acceptes instances of the Member class (int given).");

        $heap = new MemberLoginHeap();
        $heap->insert(123);
    }

    public function testCompareCallsMemberGetLogin()
    {
        $m1 = $this->getMockBuilder(Member::class)
            ->setConstructorArgs(['Bob', '1234', 35])
            ->onlyMethods(['getLogin'])
            ->getMock();
        $m1->expects($this->once())->method('getLogin')->willReturn('Bob');

        $m2 = $this->getMockBuilder(Member::class)
            ->setConstructorArgs(['Tom', '1234', 24])
            ->onlyMethods(['getLogin'])
            ->getMock();
        $m2->expects($this->once())->method('getLogin')->willReturn('Tom');

        $heap = new MemberLoginHeap();
        $heap->insert($m1);
        $heap->insert($m2);
    }
}
