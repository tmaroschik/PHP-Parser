<?php

class PHPParser_Node_Stmt_Else extends PHPParser_Node_Stmt {

	/**
	 * Statements
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Constructs an else node.
	 *
	 * @param PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $stmts = array(), $line = -1, $ignorables = array()) {
		parent::__construct($line, $ignorables);
		$this->setStmts($stmts);
	}

	/**
	 * @param PHPParser_Node[] $stmts
	 */
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