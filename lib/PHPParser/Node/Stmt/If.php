<?php

/**
 * @property PHPParser_Node_Expr           $cond    Condition expression
 * @property PHPParser_Node[]              $stmts   Statements
 * @property PHPParser_Node_Stmt_ElseIf[]  $elseifs Elseif clauses
 * @property null|PHPParser_Node_Stmt_Else $else    Else clause
 */
class PHPParser_Node_Stmt_If extends PHPParser_Node_Stmt {

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Contains elseifs
	 *
	 * @var PHPParser_Node_Stmt_ElseIf[]
	 */
	protected $elseifs;

	/**
	 * Contains else
	 *
	 * @var PHPParser_Node_Stmt_Else
	 */
	protected $else;

	/**
	 * Contains cond
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $cond;

	/**
	 * Constructs an if node.
	 *
	 * @param PHPParser_Node_Expr $cond Condition
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                        'stmts'   => array(): Statements
	 *                                        'elseifs' => array(): Elseif clauses
	 *                                        'else'    => null   : Else clause
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $cond, array $subNodes = array(), $line = -1, $ignorables = array()) {
		$this->setCond($cond);
		if (isset($subNodes['stmts']) && NULL !== $subNodes['stmts']) {
			$this->setStmts($subNodes['stmts']);
		}
		if (isset($subNodes['elseifs']) && NULL !== $subNodes['elseifs']) {
			$this->setElseifs($subNodes['elseifs']);
		}
		if (isset($subNodes['else']) && NULL !== $subNodes['else']) {
			$this->setElse($subNodes['else']);
		}
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
	 * @param PHPParser_Node_Stmt_Else $else */
	public function setElse(PHPParser_Node_Stmt_Else $else) {
		$this->else = $else;
	}

	/**
	 * @return PHPParser_Node_Stmt_Else
	 */
	public function getElse() {
		return $this->else;
	}

	/**
	 * @param PHPParser_Node_Stmt_ElseIf[] $elseifs */
	public function setElseifs(array $elseifs) {
		$this->elseifs = $elseifs;
	}

	/**
	 * @return PHPParser_Node_Stmt_ElseIf[]
	 */
	public function getElseifs() {
		return $this->elseifs;
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