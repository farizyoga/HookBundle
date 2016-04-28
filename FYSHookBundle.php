<?php

namespace FYS\HookBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use FYS\HookBundle\DependencyInjection\Compiler\HookManagerPass;

class FYSHookBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new HookManagerPass());
    }
}
