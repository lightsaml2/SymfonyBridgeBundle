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

use LightSaml\Binding\BindingFactoryInterface;
use LightSaml\Build\Container\ServiceContainerInterface;
use LightSaml\Resolver\Credential\CredentialResolverInterface;
use LightSaml\Resolver\Endpoint\EndpointResolverInterface;
use LightSaml\Resolver\Session\SessionProcessorInterface;
use LightSaml\Resolver\Signature\SignatureResolverInterface;
use LightSaml\Validator\Model\Assertion\AssertionTimeValidatorInterface;
use LightSaml\Validator\Model\Assertion\AssertionValidatorInterface;
use LightSaml\Validator\Model\NameId\NameIdValidatorInterface;
use LightSaml\Validator\Model\Signature\SignatureValidatorInterface;

class ServiceContainer implements ServiceContainerInterface
{
    public function __construct(
        private readonly AssertionValidatorInterface $assertionValidator,
        private readonly AssertionTimeValidatorInterface $assertionTimeValidator,
        private readonly SignatureResolverInterface $signatureResolver,
        private readonly EndpointResolverInterface $endpointResolver,
        private readonly NameIdValidatorInterface $nameIdValidator,
        private readonly BindingFactoryInterface $bindingFactory,
        private readonly SignatureValidatorInterface $signatureValidator,
        private readonly CredentialResolverInterface $credentialResolver,
        private readonly SessionProcessorInterface $sessionProcessor
    ) { }

    public function getAssertionValidator(): AssertionValidatorInterface {
        return $this->assertionValidator;
    }

    public function getAssertionTimeValidator(): AssertionTimeValidatorInterface {
        return $this->assertionTimeValidator;
    }

    public function getSignatureResolver(): SignatureResolverInterface {
        return $this->signatureResolver;
    }

    public function getEndpointResolver(): EndpointResolverInterface {
        return $this->endpointResolver;
    }

    public function getNameIdValidator(): NameIdValidatorInterface {
        return $this->nameIdValidator;
    }

    public function getBindingFactory(): BindingFactoryInterface {
        return $this->bindingFactory;
    }

    public function getSignatureValidator(): SignatureValidatorInterface {
        return $this->signatureValidator;
    }

    public function getCredentialResolver(): CredentialResolverInterface {
        return $this->credentialResolver;
    }

    /**
     * @return \LightSaml\Resolver\Logout\LogoutSessionResolverInterface
     */
    public function getLogoutSessionResolver()
    {
        throw new \LogicException('Not implemented');
    }

    /**
     * @return SessionProcessorInterface
     */
    public function getSessionProcessor(): SessionProcessorInterface {
        return $this->sessionProcessor;
    }
}
