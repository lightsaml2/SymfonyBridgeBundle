<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class AddMethodCallCompilerPass implements CompilerPassInterface
{
    public function __construct(private readonly string $serviceId, private readonly string $tagName, private readonly string $methodName)
    {
    }

    public function getServiceId(): string {
        return $this->serviceId;
    }

    public function getTagName(): string {
        return $this->tagName;
    }

    public function getMethodName(): string {
        return $this->methodName;
    }

    public function process(ContainerBuilder $container): void {
        if (false === $container->has($this->serviceId)) {
            return;
        }

        $definition = $container->findDefinition($this->serviceId);

        $taggedServices = $container->findTaggedServiceIds($this->tagName);

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall($this->methodName, [new Reference($id)]);
        }
    }
}
