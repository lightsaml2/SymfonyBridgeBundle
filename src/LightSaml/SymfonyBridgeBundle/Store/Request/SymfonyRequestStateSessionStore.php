<?php

namespace LightSaml\SymfonyBridgeBundle\Store\Request;

use LightSaml\Store\Request\AbstractRequestStateArrayStore;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SymfonyRequestStateSessionStore extends AbstractRequestStateArrayStore
{

    public function __construct(private readonly RequestStack $requestStack, private readonly string $providerId, private readonly string $prefix = 'saml_request_state_') {  }

    /**
     * @return string
     */
    protected function getKey(): string {
        return sprintf('%s_%s', $this->providerId, $this->prefix);
    }

    protected function getSession(): SessionInterface {
        return $this->requestStack->getSession();
    }

    /**
     * @return array
     */
    protected function getArray(): array {
        return $this->getSession()->get($this->getKey(), []);
    }

    protected function setArray(array $arr): void {
        $this->getSession()->set($this->getKey(), $arr);
    }
}
