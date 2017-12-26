<?php

namespace AnilcanCakir\Former\Tests\Unit;

use AnilcanCakir\Former\Tests\TestCase;

class FormerHelperTest extends TestCase
{
    /** @test */
    public function testConfigMethodShouldGetConfigValue()
    {
        $this->config()->shouldReceive('get')->andReturn('value');

        $this->assertSame('value', $this->formerHelper()->config('sample'));
    }

    /** @test */
    public function testGetThemeMethodShouldGetDefaultTheme()
    {
        $this->config()->shouldReceive('get')->andReturn('sample');

        $this->assertSame('sample', $this->formerHelper()->getThemeOrDefault());
    }

    /** @test */
    public function testGetThemeMethodShouldGetGivenTheme()
    {
        $this->assertSame('foo', $this->formerHelper()->getThemeOrDefault('foo'));
    }

    /** @test */
    public function testViewPathMethodShouldReturnExistsView()
    {
        $this->config()->shouldReceive('get')->andReturn('my_theme');
        $this->view()->shouldReceive('exists')->andReturn(true);

        $this->assertSame('former.my_theme.sample', $this->formerHelper()->getViewPath('sample'));
    }
}
