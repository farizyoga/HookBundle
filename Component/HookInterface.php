<?php

namespace FYS\HookBundle\Component;

interface HookInterface
{
	public function getName();
	public function getAction();
	public function getPriority();
}