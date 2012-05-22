<?php

class PHPParser_Node_Expr_Isset extends PHPParser_Node_Expr {

	/**
	 * Variables
	 *
	 * @var PHPParser_Node_Expr[]
	 */
	protected $vars = array();

	/**
	 * Constructs an array node.
	 *
	 * @param PHPParser_Node_Expr[] $vars Variables
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $vars, $line = -1, $ignorables = array()) {
		$this->setVars($vars);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr[] $vars */
	public function setVars(array $vars) {
		$this->vars = $vars;
	}

	/**
	 * @return PHPParser_Node_Expr[]
	 */
	public function getVars() {
		return $this->vars;
	}
}