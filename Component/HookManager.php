<?php

namespace FYS\HookBundle\Component;

class HookManager
{
	protected $hooks = array();

	public function addHook($hook)
	{
		$this->hooks[] = $hook;
	}

	public function getHooks()
	{
		$allHooks = array();

		foreach($this->hooks as $hook) {
			$allHooks[get_class($hook)] = $hook->getName();
		}

		return $allHooks;
	}

	public function call($requestedHook)
	{
		$hookActions = array();

		foreach($this->hooks as $hook) {
			if ($hook->getName() == $requestedHook) {
				$hookActions[$hook->getPriority()] = $hook->getAction();
			}
		}

		$sortHookActions = ksort($hookActions);
		$sortedHookActions = array();

		foreach($hookActions as $hookAction) {
			$sortedHookActions[] = $hookAction;
		}

		return implode($sortedHookActions);
	}
}