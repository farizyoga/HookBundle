<?php

namespace FYS\HookBundle\Component\Hooks;

use Symfony\Component\DependencyInjection\Container;

class HookHead
{
	protected $container;

	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	public function getName()
	{
		return 'head';
	}

	public function getAction()
	{
		$twig = $this->container->get('twig');

		return $twig->render('FYSHookBundle::test.html.twig', array());
	}

	public function getPriority()
	{
		return 1;
	}
}