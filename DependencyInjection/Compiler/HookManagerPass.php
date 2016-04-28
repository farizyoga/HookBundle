<?php

namespace FYS\HookBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class HookManagerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        if (!$container->has('fys.hook_manager')) {
            return;
        }

        $definition = $container->findDefinition(
            'fys.hook_manager'
        );

        $taggedServices = $container->findTaggedServiceIds(
            'hook.type'
        );

        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall(
                'addHook',
                array(new Reference($id))
            );
        }
    }
}