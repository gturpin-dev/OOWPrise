<?php

namespace OOWPrise\PHPAttributes;

interface HookInterface {

	/**
	 * Bind the hook from the PHP Attribute.
	 *
	 * @param callable|array $method The method to bind to the hook.
	 *
	 * @return void
	 */
	public function register( callable|array $method ): void;
}
