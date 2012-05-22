<?php

/**
 * @property PHPParser_Node_Expr        $cond  Condition
 * @property PHPParser_Node_Stmt_Case[] $cases Case list
 */
class PHPParser_Node_Stmt_Switch extends PHPParser_Node_Stmt {

	/**
	 * Contains cond
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $cond;

	/**
	 * Contains cases
	 *
	 * @var PHPParser_Node_Stmt_Case[]
	 */
	protected $cases;

	/**
	 * Constructs a case node.
	 *
	 * @param PHPParser_Node_Expr $cond Condition
	 * @param PHPParser_Node_Stmt_Case[] $cases Case list
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $cond, array $cases, $line = -1, $ignorables = array()) {
		$this->setCond($cond);
		$this->setCases($cases);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Stmt_Case[] $cases */
	public function setCases(array $cases) {
		$this->cases = $cases;
	}

	/**
	 * @return PHPParser_Node_Stmt_Case[]
	 */
	public function getCases() {
		return $this->cases;
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
}