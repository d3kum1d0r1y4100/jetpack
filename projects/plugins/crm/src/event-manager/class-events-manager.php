<?php
/**
 * Events_Manager class.
 *
 * @package automattic/jetpack-crm
 */

namespace Automattic\Jetpack\CRM\Event_Manager;

/**
 * Events_Manager class.
 *
 * @since $$next-version$$
 */
class Events_Manager {

	/**
	 * The Events_Manager instance.
	 *
	 * @since $$next-version$$
	 * @var Events_Manager
	 */
	private static $instance = null;

	/**
	 * Get the singleton instance of this class.
	 *
	 * @since $$next-version$$
	 *
	 * @return Events_Manager The Events_Manager instance.
	 */
	public static function get_instance(): Events_Manager {
		if ( ! self::$instance ) {
			self::$instance = new Events_Manager();
		}

		return self::$instance;
	}

	/**
	 * Return the Contact_Event instance.
	 *
	 * @since $$next-version$$
	 *
	 * @return Contact_Event A Contact_Event instance.
	 */
	public function contact(): Contact_Event {
		return new Contact_Event();
	}

	/**
	 * Return the Invoice_Event instance.
	 *
	 * @since $$next-version$$
	 *
	 * @return Invoice_Event A Invoice_Event instance.
	 */
	public function invoice(): Invoice_Event {
		return new Invoice_Event();
	}

	/**
	 * Return the Transaction_Event instance.
	 *
	 * @since $$next-version$$
	 *
	 * @return Transaction_Event A Transaction_Event instance.
	 */
	public function transaction(): Transaction_Event {
		return new Transaction_Event();
	}
}
