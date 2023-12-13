<?php

namespace App\Heap;

use App\User\Member;

abstract class MemberHeap extends \SplHeap
{
    public function insert(mixed $value): bool
    {
        if (!$value instanceof Member) {
            $type = \is_object($value) ? get_class($value) : get_debug_type($value);

            throw new \InvalidArgumentException(
                sprintf("%s only acceptes instances of the Member class (%s given).", __CLASS__, $type)
            );
        }

        return parent::insert($value);
    }
}
