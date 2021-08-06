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

class Symfony53SsoStateSessionStore implements SsoStateStoreInterface
{
    /** @var RequestStack */
    protected $requestStack;

    /** @var string */
    protected $key;

    /**
     * @param string $key
     */
    public function __construct(RequestStack $requestStack, $key)
    {
        $this->requestStack = $requestStack;
        $this->key = $key;
    }

    protected function getSession(): SessionInterface {
        return $this->requestStack->getSession();
    }

    /**
     * @return SsoState
     */
    public function get()
    {
        $result = $this->getSession()->get($this->key);
        if (null == $result) {
            $result = new SsoState();
            $this->set($result);
        }

        return $result;
    }

    /**
     * @return void
     */
    public function set(SsoState $ssoState)
    {
        $ssoState->setLocalSessionId($this->getSession()->getId());
        $this->getSession()->set($this->key, $ssoState);
    }
}
