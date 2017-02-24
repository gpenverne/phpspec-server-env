<?php

namespace PhpSpec\Extension;

use PhpSpec\ServiceContainer;
use PhpSpec\Extension\ExtensionInterfacep;
use PhpSpec\Extension\Listener\ServerEnvListener;

class ServerEnvExtension implements ExtensionInterface
{
    public function load(ServiceContainer $container)
    {
        if (method_exists($container, 'setShared')) {
            $container->setShared('event_dispatcher.listeners.environment', function ($container) {
                return new ServerEnvListener($container->getParam('server_env'));
            });
        } else {
            $container->define('event_dispatcher.listeners.environment', function ($container) use ($params) {
                return new ServerEnvListener($container->getParam('server_env'));
            }, ['event_dispatcher.listeners']);
        }
    }
}
