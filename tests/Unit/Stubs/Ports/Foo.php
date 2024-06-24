<?php

namespace Tests\Unit\Stubs\Ports;

use DeGraciaMathieu\RapidBind\Bind;
use Tests\Unit\Stubs\Adapters\FooAdapter;

#[Bind(FooAdapter::class)]
class Foo {
    //
}
