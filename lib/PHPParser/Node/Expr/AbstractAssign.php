<?php

abstract class PHPParser_Node_Expr_AbstractAssign extends PHPParser_Node_Expr {

	/**
	 * Variable
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $var;

	/**
	 * Expression
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $expr;

	/**
	 * Constructs an assignment node.
	 *
	 * @param PHPParser_Node_Expr $var Variable
	 * @param PHPParser_Node_Expr $expr Expression
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $var, PHPParser_Node_Expr $expr, $line = -1, $ignorables = array()) {
		$this->setVar($var);
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
	 * @param \PHPParser_Node_Expr $var */
	public function setVar(PHPParser_Node_Expr $var) {
		$this->var = $var;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getVar() {
		return $this->var;
	}
}