<?php

/*
 * This file is part of the LightSAML Symfony Bridge Bundle package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Factory;

use LightSaml\Store\Credential\CompositeCredentialStore;
use LightSaml\Store\Credential\CredentialStoreInterface;
use LightSaml\Store\Credential\Factory\CredentialFactory;
use LightSaml\Store\EntityDescriptor\EntityDescriptorStoreInterface;

class CredentialStoreFactory
{
    public static function build(
        EntityDescriptorStoreInterface $idpEntityDescriptorStore,
        EntityDescriptorStoreInterface $spEntityDescriptorStore,
        string $ownEntityId,
        CredentialStoreInterface $ownCredentialStore,
        array $extraCredentials = null
    ): CompositeCredentialStore {
        $factory = new CredentialFactory();

        return $factory->build(
            $idpEntityDescriptorStore,
            $spEntityDescriptorStore,
            $ownCredentialStore->getByEntityId($ownEntityId),
            $extraCredentials
        );
    }
}
