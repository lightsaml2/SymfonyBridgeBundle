<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Bridge\Container;

use LightSaml\Build\Container\ProviderContainerInterface;
use LightSaml\Provider\Attribute\AttributeValueProviderInterface;
use LightSaml\Provider\NameID\NameIdProviderInterface;
use LightSaml\Provider\Session\SessionInfoProviderInterface;

class ProviderContainer implements ProviderContainerInterface
{
    public function __construct(
        private readonly AttributeValueProviderInterface $attributeValueProvider,
        private readonly SessionInfoProviderInterface $sessionInfoProvider,
        private readonly NameIdProviderInterface $nameIdProvider
    ) { }

    public function getAttributeValueProvider(): AttributeValueProviderInterface {
        return $this->attributeValueProvider;
    }

    public function getSessionInfoProvider(): SessionInfoProviderInterface {
        return $this->sessionInfoProvider;
    }

    public function getNameIdProvider(): NameIdProviderInterface {
        return $this->nameIdProvider;
    }
}
