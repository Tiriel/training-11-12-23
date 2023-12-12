<?php

namespace App\Heap;

use App\User\Member;

class MemberAgeHeap extends MemberHeap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        assert($value1 instanceof Member);
        assert($value2 instanceof Member);

        //$ref = new \ReflectionClass(Member::class);
        //$age1 = $ref->getProperty('age')->getValue($value1);
        //$age2 = $ref->getProperty('age')->getValue($value2);

        $getAge = fn() => $this->age;
        $age1 = $getAge->call($value1);
        $age2 = $getAge->call($value2);

        return $age2 <=> $age1;
    }
}
