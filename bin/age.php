<?php

use App\Heap\MemberAgeHeap;
use App\Heap\MemberLoginHeap;
use App\User\Member;

function age(array $argv): never
{
    $members = [
        new Member('Bob', 'abcd1234', 35),
        new Member('Paul', 'abcd1234', 75),
        new Member('Tom', 'abcd1234', 12),
        new Member('Jean', 'abcd1234', 32),
        new Member('Elias', 'abcd1234', 56),
    ];

    $heap = new MemberAgeHeap();
    foreach ($members as $member) {
        $heap->insert($member);
    }

    foreach ($heap as $member) {
        echo sprintf("Member : %s", $member);
    }
    echo "----------------------\n";

    $loginHeap = new MemberLoginHeap();
    foreach ($members as $member) {
        $loginHeap->insert($member);
    }

    foreach ($loginHeap as $member) {
        echo sprintf("Member : %s", $member);
    }

    exit(0);
}
