<?php

class PHPParser_Node_Expr_AssignList extends PHPParser_Node_Expr {

	/**
	 * List of variables to assign to
	 *
	 * @var array
	 */
	protected $vars;

	/**
	 * Expression
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $expr;

	/**
	 * Constructs a list() assignment node.
	 *
	 * @param array $vars List of variables to assign to
	 * @param PHPParser_Node_Expr $expr Expression
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(array $vars, PHPParser_Node_Expr $expr, $line = -1, $ignorables = array()) {
		$this->setVars($vars);
		$this->setExpr($expr);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param \PHPParser_Node_Expr $expr */
	public function setExpr(PHPParser_Node_Expr $expr) {
		$this->expr = $expr;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getExpr() {
		return $this->expr;
	}

	/**
	 * @param array $vars */
	public function setVars(array $vars) {
		$this->vars = $vars;
	}

	/**
	 * @return array
	 */
	public function getVars() {
		return $this->vars;
	}
}