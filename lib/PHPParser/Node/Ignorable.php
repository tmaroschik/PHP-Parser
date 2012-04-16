<?php

class PHPParser_Node_Ignorable extends PHPParser_NodeAbstract {

	/**
	 * Constructs a const node for use in class const and const statements.
	 *
	 * @param string              $name       Name
	 * @param PHPParser_Node_Expr $value      Value
	 * @param int                 $line       Line
	 * @param null|array          $ignorables All Ignorables
	 */
	public function __construct($value, $line = -1) {
		parent::__construct(
			array(
				'value' => $value,
			),
			$line
		);
	}

}
