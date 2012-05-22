<?php

/**
 * @property PHPParser_Node_Expr $cond  Condition
 * @property PHPParsre_Node[]    $stmts Statements
 */
class PHPParser_Node_Stmt_While extends PHPParser_Node_Stmt {

	/**
	 * Contains cond
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $cond;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Constructs a while node.
	 *
	 * @param PHPParser_Node_Expr $cond Condition
	 * @param PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $cond, array $stmts = array(), $line = -1, $ignorables = array()) {
		$this->setCond($cond);
		$this->setStmts($stmts);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr $cond */
	public function setCond(PHPParser_Node_Expr $cond) {
		$this->cond = $cond;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getCond() {
		return $this->cond;
	}

	/**
	 * @param PHPParser_Node[] $stmts */
	public function setStmts(array $stmts) {
		$this->stmts = $stmts;
	}

	/**
	 * @return PHPParser_Node[]
	 */
	public function getStmts() {
		return $this->stmts;
	}
}