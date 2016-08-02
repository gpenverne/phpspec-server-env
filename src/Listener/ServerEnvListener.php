<?php

namespace PhpSpec\Extension\Listener;

use PhpSpec\Console\IO;
use PhpSpec\Event\ExampleEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class ServerEnvListener implements EventSubscriberInterface {
    private $variables = null;

    private $env_stacks = [];

    public function __construct($variables = []) {
        $this->variables = $variables;
    }

    public function beforeExample(ExampleEvent $event) {
        $env_stack = [];
        foreach($this->variables as $key => $value) {
            $value_env = $_SERVER[$key];
            if($value_env) {
                $env_stack[$key] = $value_env;
            }
            $_SERVER[$key] = $value;
        }
        array_push($this->env_stacks, $env_stack);
    }

    public function afterExample(ExampleEvent $event) {
        foreach(array_pop($this->env_stacks) as $key => $value) {
            $_SERVER[$key] = $value;
        }
    }

    /**
     * {@inheritDoc}
     */
    public static function getSubscribedEvents() {
        return [
            'beforeExample' => array('beforeExample', -10),
            'afterExample'  => array('afterExample', -10),
        ];
    }
}
