<?php

namespace DeGraciaMathieu\RapidBind;

use ReflectionClass;
use DeGraciaMathieu\RapidBind\Bind;
use Illuminate\Support\Facades\App;
use Composer\ClassMapGenerator\ClassMapGenerator;

class RapidBind
{
    public function bind(array $paths): void
    {
        foreach ($paths as $path) {

            $classMap = ClassMapGenerator::createMap(realpath($path));

            foreach ($classMap as $port => $_) {

                $attributes = $this->getBindAttributes($port);

                foreach ($attributes as $bind) {

                    $implement = $bind->getArguments()[0];

                    App::singleton($port, $implement);
                }
            }
        }
    }

    private function getBindAttributes(string $port): array
    {
        $reflectionClass = new ReflectionClass($port);

        return $reflectionClass->getAttributes(Bind::class);
    }
}
