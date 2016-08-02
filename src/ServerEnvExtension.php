<?php

namespace PhpSpec\Extension;

use PhpSpec\ServiceContainer;
use PhpSpec\Extension\ExtensionInterfacep;
use PhpSpec\Extension\Listener\ServerEnvListener;

class ServerEnvExtension implements ExtensionInterface {
    public function load(ServiceContainer $container) {
        $container->setShared('event_dispatcher.listeners.environment', function ($container) {
            return new ServerEnvListener($container->getParam('server_env'));
        });
	}
}
