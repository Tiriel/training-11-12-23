<?php

namespace App\Heap;

use App\User\Member;

abstract class MemberHeap extends \SplHeap
{
    public function insert(mixed $value): bool
    {
        if (!$value instanceof Member) {
            throw new \InvalidArgumentException(
                sprintf("%s only acceptes instances of the Member class (%s given).", __CLASS__, get_class($value))
            );
        }

        return parent::insert($value);
    }
}
