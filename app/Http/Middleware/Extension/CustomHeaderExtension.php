<?php

namespace App\Http\Middleware\Extension;

use Dedoc\Scramble\Extensions\OperationExtension;
use Dedoc\Scramble\Support\Generator\Operation;
use Dedoc\Scramble\Support\Generator\Parameter;
use Dedoc\Scramble\Support\Generator\Schema;
use Dedoc\Scramble\Support\Generator\Types\StringType;
use Dedoc\Scramble\Support\RouteInfo;

/**
 * Api request headers for scramble
 */
class CustomHeaderExtension extends OperationExtension
{
    public function handle(Operation $operation, RouteInfo $routeInfo): void
    {
        if (! $routeInfo->reflectionMethod() || $routeInfo->phpDoc()->getTagsByName('@not-deprecated')) {
            return;
        }
        $operation->addParameters([
            Parameter::make('Accept-Language', 'header')
                ->setSchema(
                    Schema::fromType(new StringType())
                )->required(false)
                ->description('client localization')
                ->example(getenv('APP_LOCALE')),
        ]);

    }
}
