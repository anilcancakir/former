<?php

namespace AnilcanCakir\Former\Tests\Unit;

use AnilcanCakir\Former\Tests\TestCase;

class BasicTest extends TestCase
{
    /** @test */
    public function testIsWorking()
    {
        $this->config()->shouldReceive('get')
            ->with('former.foo')->andReturn('bar');

        $this->assertSame('bar', $this->formerHelper()->config('foo'));
    }

    /** @test */
    public function testIsWorkingAgain()
    {
        $this->config()->shouldReceive('get')
            ->with('former.anilcan')->andReturn('Anılcan Çakır');

        $this->assertSame('Anılcan Çakır', $this->formerHelper()->config('anilcan'));
    }
}
