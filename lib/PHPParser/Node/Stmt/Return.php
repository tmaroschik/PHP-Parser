<?php

/**
 * @property null|PHPParser_Node_Expr $expr Expression
 */
class PHPParser_Node_Stmt_Return extends PHPParser_Node_Stmt {

	/**
	 * Contains expr
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $expr;

	/**
	 * Constructs a return node.
	 *
	 * @param null|PHPParser_Node_Expr $expr Expression
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $expr = null, $line = -1, $ignorables = array()) {
		if (NULL !== $expr) {
			$this->setExpr($expr);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr $expr */
	public function setExpr(PHPParser_Node_Expr $expr) {
		$this->expr = $expr;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getExpr() {
		return $this->expr;
	}
}