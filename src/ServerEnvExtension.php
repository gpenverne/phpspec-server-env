<?php

namespace PhpSpec\Extension;

use PhpSpec\ServiceContainer;
use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\Extension\Listener\ServerEnvListener;
use PhpSpec\Extension\ServerEnvLoader;
use PhpSpec\Extension;

if (class_exists(Extension::class)) {
    class ServerEnvExtension extends ServerEnvLoader implements Extension
    {
    }
} else {
    class ServerEnvExtension extends ServerEnvLoader implements ExtensionInterface
    {
    }
}
