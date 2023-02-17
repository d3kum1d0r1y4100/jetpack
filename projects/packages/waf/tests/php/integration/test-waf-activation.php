<?php
/**
 * Activation tests.
 *
 * @package automattic/jetpack-waf
 */

use Automattic\Jetpack\Waf\Waf_Initializer;
use Automattic\Jetpack\Waf\Waf_Runner;

/**
 * Activation tests.
 */
final class WafActivationTest extends WorDBless\BaseTestCase {

	/**
	 * Test setup.
	 *
	 * @before
	 */
	protected function set_up() {
		// Set a blog token and id so the site is connected.
		Jetpack_Options::update_option( 'blog_token', 'asdasd.123123' );
		Jetpack_Options::update_option( 'id', 1234 );
	}

	/**
	 * Test WAF activation.
	 */
	public function testActivation() {
		Waf_Initializer::on_activation();

		$this->assertSame( get_option( Waf_Runner::MODE_OPTION_NAME ), 'normal' );
	}

}