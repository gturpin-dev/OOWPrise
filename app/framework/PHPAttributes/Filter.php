<?php

namespace OOWPrise\PHPAttributes;

use Attribute;
use OOWPrise\PHPAttributes\HookInterface;

/**
 * This class defines a PHP Attribute to use a filter in a class
 */
#[Attribute(Attribute::TARGET_METHOD|Attribute::IS_REPEATABLE)]
final class Filter implements HookInterface {

	public function __construct(
		private string $hook,
		private int $priority = 10,
		private int $accepted_args = 1
	) {}

	/**
	 * @inheritDoc
	 */
	public function register( callable|array $method ): void {
		\OOWPrise\Support\Facades\Filter::add( $this->hook, $method, $this->priority, $this->accepted_args );
	}
}
