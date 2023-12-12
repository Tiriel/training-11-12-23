<?php

namespace App\Heap;

use App\User\Member;

class MemberLoginHeap extends MemberHeap
{
    protected function compare(mixed $value1, mixed $value2): int
    {
        assert($value1 instanceof Member);
        assert($value2 instanceof Member);

        $getLogin = fn() => $this->login;
        $login1 = $getLogin->call($value1);
        $login2 = $getLogin->call($value2);

        return strcmp($login2, $login1);
    }
}
