<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\Bridge\Container;

use LightSaml\Provider\TimeProvider\TimeProviderInterface;
use LightSaml\SymfonyBridgeBundle\Bridge\Container\SystemContainer;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SystemContainerTest extends TestCase
{
    public function test_constructs_with_all_arguments()
    {
        $container = new SystemContainer(
            $this->getMockBuilder(RequestStack::class)->getMock(),
            $this->getMockBuilder(TimeProviderInterface::class)->getMock(),
            $this->getMockBuilder(EventDispatcherInterface::class)->getMock(),
            $this->getMockBuilder(LoggerInterface::class)->getMock()
        );

        $this->assertInstanceOf(TimeProviderInterface::class, $container->getTimeProvider());
        $this->assertInstanceOf(EventDispatcherInterface::class, $container->getEventDispatcher());
        $this->assertInstanceOf(LoggerInterface::class, $container->getLogger());
    }
}
