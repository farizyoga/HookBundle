<?php

namespace FYS\HookBundle\Component\Extension;

use Symfony\Component\DependencyInjection\Container;

class TwigExtension extends \Twig_Extension
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function getFunctions()
	{
		return array(
			'call_hook' => new \Twig_Function_Method($this, 'callHook')
		);
	}

	public function callHook($hookName)
	{
		$container = $this->container;

		$hookManager = $container->get('fys.hook_manager');

		return $hookManager->call($hookName);
	}

	public function getName()
	{
		return 'hook.manager';
	}
}