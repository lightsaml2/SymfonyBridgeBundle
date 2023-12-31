<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\Bridge\Container;

use LightSaml\Build\Container\CredentialContainerInterface;
use LightSaml\Build\Container\OwnContainerInterface;
use LightSaml\Build\Container\PartyContainerInterface;
use LightSaml\Build\Container\ProviderContainerInterface;
use LightSaml\Build\Container\ServiceContainerInterface;
use LightSaml\Build\Container\StoreContainerInterface;
use LightSaml\Build\Container\SystemContainerInterface;
use LightSaml\SymfonyBridgeBundle\Bridge\Container\BuildContainer;
use PHPUnit\Framework\TestCase;

class BuildContainerTest extends TestCase
{
    public function test_constructs_with_all_containers()
    {
        $container = new BuildContainer(
            $this->getMockBuilder(SystemContainerInterface::class)->getMock(),
            $this->getMockBuilder(PartyContainerInterface::class)->getMock(),
            $this->getMockBuilder(StoreContainerInterface::class)->getMock(),
            $this->getMockBuilder(ProviderContainerInterface::class)->getMock(),
            $this->getMockBuilder(CredentialContainerInterface::class)->getMock(),
            $this->getMockBuilder(ServiceContainerInterface::class)->getMock(),
            $this->getMockBuilder(OwnContainerInterface::class)->getMock()
        );

        $this->assertInstanceOf(SystemContainerInterface::class, $container->getSystemContainer());
        $this->assertInstanceOf(PartyContainerInterface::class, $container->getPartyContainer());
        $this->assertInstanceOf(StoreContainerInterface::class, $container->getStoreContainer());
        $this->assertInstanceOf(ProviderContainerInterface::class, $container->getProviderContainer());
        $this->assertInstanceOf(CredentialContainerInterface::class, $container->getCredentialContainer());
        $this->assertInstanceOf(ServiceContainerInterface::class, $container->getServiceContainer());
        $this->assertInstanceOf(OwnContainerInterface::class, $container->getOwnContainer());
    }
}
