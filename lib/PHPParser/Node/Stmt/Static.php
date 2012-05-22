<?php

/**
 * @property PHPParser_Node_Stmts_StaticVar[] $vars Variable definitions
 */
class PHPParser_Node_Stmt_Static extends PHPParser_Node_Stmt {

	/**
	 * Contains vars
	 *
	 * @var PHPParser_Node_Stmts_StaticVar[]
	 */
	protected $vars;

	/**
	 * Constructs a static variables list node.
	 *
	 * @param PHPParser_Node_Stmts_StaticVar[] $vars Variable definitions
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $vars, $line = -1, $ignorables = array()) {
		$this->setVars($vars);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Stmts_StaticVar[] $vars */
	public function setVars(array $vars) {
		$this->vars = $vars;
	}

	/**
	 * @return PHPParser_Node_Stmts_StaticVar[]
	 */
	public function getVars() {
		return $this->vars;
	}
}