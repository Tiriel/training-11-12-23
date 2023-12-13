<?php

namespace Tests\User\Proxy;

use App\Cache\ArrayCache;
use App\User\Member;
use App\User\Proxy\ProxyMember;
use PHPUnit\Framework\TestCase;

class ProxyMemberTest extends TestCase
{
    public function testProxyAuthCallsMemberAuthWhenCacheMiss(): array
    {
        $mock = $this->getMockBuilder(Member::class)
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->onlyMethods(['auth'])
            ->getMock();

        $mock->expects($this->once())->method('auth')->willReturn(true);
        $cache = new ArrayCache();

        $proxy = new ProxyMember($mock, $cache);
        $proxy->auth('Bob', '1234');

        $this->assertTrue($cache->cache['Bob']);

        return [$proxy, $mock, $cache];
    }

    /**
     * @depends testProxyAuthCallsMemberAuthWhenCacheMiss
     */
    public function testProxyCallsCacheWhenKeyExists(array $proxyAndMock): void
    {
        [$proxy, $mock] = $proxyAndMock;

        $mock->expects($this->never())->method('auth');
        $proxy->auth('Bob', '1234');
    }
}
