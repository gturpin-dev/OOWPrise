<?php

namespace OOWPrise\Support\Hook;

use OOWPrise\Support\Facades\Action;
use OOWPrise\Support\Facades\Filter;

/**
 * Parent class for all hooks defined with a class.
 */
abstract class Hook {

	/**
	 * The hook name.
	 *
	 * @var string
	 */
	protected string $hook;

	/**
	 * The hook type.
	 * Can be either "action" or "filter".
	 *
	 * @var string
	 */
	protected string $hook_type = 'action';

	/**
	 * The priority of the hook.
	 *
	 * @var integer
	 */
	protected int $priority = 10;

	/**
	 * The number of arguments accepted by the callback function.
	 *
	 * @var integer
	 */
	protected int $accepted_args = 1;

	/**
	 * Register the hook with the "callback" method which must be defined in the child class.
	 *
	 * @return void
	 */
	public function register(): void {
		$this->check_callback_method_exists();

		if ( $this->hook_type === 'filter' ) {
			Filter::add( $this->hook, [ $this, 'callback' ], $this->priority, $this->accepted_args );
		}

		Action::add( $this->hook, [ $this, 'callback' ], $this->priority, $this->accepted_args );
	}

	/**
	 * Check if the callback method exists.
	 * The callback method must be implemented by the child class.
	 * But it can have any parameters number or none, so we cannot create it in Interface or Abstract method.
	 *
	 * @return boolean
	 */
	private function check_callback_method_exists(): bool {
		if ( ! method_exists( $this, 'callback' ) ) {
			throw new \Exception( 'The "callback" method must be implemented by the child class.' );
		}

		return true;
	}
}
