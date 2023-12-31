<?php

/*
 * This file is part of the LightSAML-Core package.
 *
 * (c) Milos Tomic <tmilos@lightsaml.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace LightSaml\SymfonyBridgeBundle\Store\Sso;

use LightSaml\State\Sso\SsoState;
use LightSaml\Store\Sso\SsoStateStoreInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SymfonySsoStateSessionStore implements SsoStateStoreInterface
{
    public function __construct(private readonly RequestStack $requestStack, private readonly string $key) { }

    protected function getSession(): SessionInterface {
        return $this->requestStack->getSession();
    }

    /**
     * @return SsoState
     */
    public function get(): SsoState {
        $result = $this->getSession()->get($this->key);
        if (null == $result) {
            $result = new SsoState();
            $this->set($result);
        }

        return $result;
    }

    public function set(SsoState $ssoState): void {
        $ssoState->setLocalSessionId($this->getSession()->getId());
        $this->getSession()->set($this->key, $ssoState);
    }
}
