<?php

namespace Tests\Unit;

use Orchestra\Testbench\TestCase;
use Illuminate\Support\Facades\App;
use PHPUnit\Framework\Attributes\Test;
use DeGraciaMathieu\RapidBind\Facades\RapidBind;

class RapidBindTest extends TestCase
{
    public function getEnvironmentSetUp($app)
    {
        //$app->setBasePath(realpath(__DIR__ . '/..'));
    }

    #[Test]
    public function it_should_create_singleton_with_Bind_attribute(): void
    {
        App::shouldReceive('singleton')
            ->with(
                'Tests\Unit\Stubs\Ports\Foo', 
                'Tests\Unit\Stubs\Adapters\FooAdapter',
            )
            ->once();

        RapidBind::bind([
            realpath('tests/Unit/Stubs/Ports'),
        ]);
    }

    #[Test]
    public function it_should_not_create_singleton_without_Bind_attribute(): void
    {
        App::spy()
            ->shouldNotHaveReceived('singleton');

        RapidBind::bind([
            realpath('tests/Unit/Stubs/Services')
        ]);
    }
}
