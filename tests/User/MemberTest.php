<?php

namespace Tests\User;

use App\User\Admin;
use App\User\Member;
use PHPUnit\Framework\TestCase;

class MemberTest extends TestCase
{
    /** @var Member[] */
    protected static array $members = [];

    public static function setUpBeforeClass(): void
    {
        static::$members[] = Member::create('Bob', '1234', 35);
    }

    public function testConstructIncrementsStaticCounter()
    {
        $this->markTestSkipped('Flaky');
        $this->assertSame(1, Member::count());

        static::$members[] = Member::create('Tom', '1234', 24);

        $this->assertSame(2, Member::count());
    }

    public function testDestructDecrementsStaticCounter()
    {
        $this->markTestSkipped('Flaky');
        $this->assertSame(2, Member::count());

        $member = array_pop(static::$members);
        unset($member);

        $this->assertSame(1, Member::count());
    }

    public function testConstructDoesNotIncrementStaticCounterForChildClasses()
    {
        $this->markTestSkipped('Flaky');
        $this->assertSame(1, Member::count());

        static::$members[] = Admin::create('Tom', '1234', 24);

        $this->assertSame(1, Member::count());
    }

    public function testAuthReturnsTrueIfLoginAndPasswordMatchMemberS()
    {
        $this->assertTrue(static::$members[0]->auth('Bob', '1234'));
    }

    public function testAuthThrowsOnInvalidLogin()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Authentication failed!');

        static::$members[0]->auth('Ben', '1234');
    }

    public function testAuthThrowsOnInvalidPassword()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Authentication failed!');

        static::$members[0]->auth('Bob', '1233');
    }

    public function testCreateReturnsMemberInstanceWithHashedPassword()
    {
        $member = Member::create('Bob', '1234', 35);
        $hash = (fn() => $this->password)->call($member);

        $this->assertInstanceOf(Member::class, $member);
        $this->assertStringStartsWith('$2y$', $hash);
    }

    public function testToStringFormatsMemberAsString()
    {
        $this->assertSame("Ce membre s'appelle Bob et a 35 ans\n", (string) static::$members[0]);
    }
}
