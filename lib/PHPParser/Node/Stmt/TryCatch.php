<?php

/**
 * @property PHPParser_Node[]            $stmts   Statements
 * @property PHPParser_Node_Stmt_Catch[] $catches Catches
 */
class PHPParser_Node_Stmt_TryCatch extends PHPParser_Node_Stmt {

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Contains catches
	 *
	 * @var PHPParser_Node_Stmt_Catch[]
	 */
	protected $catches;

	/**
	 * Constructs a try catch node.
	 *
	 * @param PHPParser_Node[] $stmts Statements
	 * @param PHPParser_Node_Stmt_Catch[] $catches Catches
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $stmts, array $catches, $line = -1, $ignorables = array()) {
		$this->setStmts($stmts);
		$this->setCatches($catches);
		parent::__construct($line, $ignorables);
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

	/**
	 * @param PHPParser_Node_Stmt_Catch[] $catches */
	public function setCatches(array $catches) {
		$this->catches = $catches;
	}

	/**
	 * @return PHPParser_Node_Stmt_Catch[]
	 */
	public function getCatches() {
		return $this->catches;
	}
}