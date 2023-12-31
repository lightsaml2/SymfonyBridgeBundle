<?php

namespace LightSaml\SymfonyBridgeBundle\Tests\Bridge\Container;

use LightSaml\Binding\BindingFactoryInterface;
use LightSaml\Resolver\Credential\CredentialResolverInterface;
use LightSaml\Resolver\Endpoint\EndpointResolverInterface;
use LightSaml\Resolver\Session\SessionProcessorInterface;
use LightSaml\Resolver\Signature\SignatureResolverInterface;
use LightSaml\SymfonyBridgeBundle\Bridge\Container\ServiceContainer;
use LightSaml\Validator\Model\Assertion\AssertionTimeValidatorInterface;
use LightSaml\Validator\Model\Assertion\AssertionValidatorInterface;
use LightSaml\Validator\Model\NameId\NameIdValidatorInterface;
use LightSaml\Validator\Model\Signature\SignatureValidatorInterface;
use PHPUnit\Framework\TestCase;

class ServiceContainerTest extends TestCase
{
    public function test_constructs_with_all_arguments()
    {
        $container = new ServiceContainer(
            $this->getMockBuilder(AssertionValidatorInterface::class)->getMock(),
            $this->getMockBuilder(AssertionTimeValidatorInterface::class)->getMock(),
            $this->getMockBuilder(SignatureResolverInterface::class)->getMock(),
            $this->getMockBuilder(EndpointResolverInterface::class)->getMock(),
            $this->getMockBuilder(NameIdValidatorInterface::class)->getMock(),
            $this->getMockBuilder(BindingFactoryInterface::class)->getMock(),
            $this->getMockBuilder(SignatureValidatorInterface::class)->getMock(),
            $this->getMockBuilder(CredentialResolverInterface::class)->getMock(),
            $this->getMockBuilder(SessionProcessorInterface::class)->getMock()
        );

        $this->assertInstanceOf(AssertionValidatorInterface::class, $container->getAssertionValidator());
        $this->assertInstanceOf(AssertionTimeValidatorInterface::class, $container->getAssertionTimeValidator());
        $this->assertInstanceOf(SignatureResolverInterface::class, $container->getSignatureResolver());
        $this->assertInstanceOf(EndpointResolverInterface::class, $container->getEndpointResolver());
        $this->assertInstanceOf(NameIdValidatorInterface::class, $container->getNameIdValidator());
        $this->assertInstanceOf(BindingFactoryInterface::class, $container->getBindingFactory());
        $this->assertInstanceOf(SignatureResolverInterface::class, $container->getSignatureResolver());
        $this->assertInstanceOf(CredentialResolverInterface::class, $container->getCredentialResolver());
        $this->assertInstanceOf(SessionProcessorInterface::class, $container->getSessionProcessor());
    }
}
