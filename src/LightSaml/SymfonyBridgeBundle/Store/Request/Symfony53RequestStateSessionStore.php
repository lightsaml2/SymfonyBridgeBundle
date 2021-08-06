<?php

namespace LightSaml\SymfonyBridgeBundle\Store\Request;

use LightSaml\Store\Request\AbstractRequestStateArrayStore;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Symfony53RequestStateSessionStore extends AbstractRequestStateArrayStore
{
    /** @var RequestStack */
    protected $requestStack;

    /** @var string */
    protected $providerId;

    /** @var string */
    protected $prefix;

    /**
     * @param string $providerId
     * @param string $prefix
     */
    public function __construct(RequestStack $requestStack, $providerId, $prefix = 'saml_request_state_')
    {
        $this->requestStack = $requestStack;
        $this->providerId = $providerId;
        $this->prefix = $prefix;
    }

    /**
     * @return string
     */
    protected function getKey()
    {
        return sprintf('%s_%s', $this->providerId, $this->prefix);
    }

    protected function getSession(): SessionInterface {
        return $this->requestStack->getSession();
    }

    /**
     * @return array
     */
    protected function getArray()
    {
        return $this->getSession()->get($this->getKey(), []);
    }

    /**
     * @return AbstractRequestStateArrayStore
     */
    protected function setArray(array $arr)
    {
        $this->getSession()->set($this->getKey(), $arr);
    }
}
