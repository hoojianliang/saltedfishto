<?php
/**
 * Execute php snippets and return their output.
 *
 * @package wpcode
 */

/**
 * WPCode_Snippet_Execute_PHP class.
 */
class WPCode_Snippet_Execute_PHP extends WPCode_Snippet_Execute_Type {

	/**
	 * The snippet type, PHP for this one.
	 *
	 * @var string
	 */
	public $type = 'php';

	/**
	 * Grab snippet code and return its output.
	 *
	 * @return string
	 */
	protected function prepare_snippet_output() {
		$code = $this->get_snippet_code();

		return wpcode()->execute->safe_execute_php( $code, $this->snippet );
	}
}
