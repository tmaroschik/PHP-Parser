<?php

/**
 * @property PHPParser_Node_Expr[] $exprs Expressions
 */
class PHPParser_Node_Stmt_Echo extends PHPParser_Node_Stmt {

	/**
	 * Contains exprs
	 *
	 * @var PHPParser_Node_Expr[]
	 */
	protected $exprs = array();

	/**
	 * Constructs an echo node.
	 *
	 * @param PHPParser_Node_Expr[] $exprs Expressions
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $exprs, $line = -1, $ignorables = array()) {
		$this->setExprs($exprs);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr[] $exprs */
	public function setExprs(array $exprs) {
		$this->exprs = $exprs;
	}

	/**
	 * @return PHPParser_Node_Expr[]
	 */
	public function getExprs() {
		return $this->exprs;
	}
}