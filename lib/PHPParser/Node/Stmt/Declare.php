<?php

/**
 * @property PHPParser_Node_Stmt_DeclareDeclare[] $declares List of declares
 * @property PHPParser_Node[]                     $stmts    Statements
 */
class PHPParser_Node_Stmt_Declare extends PHPParser_Node_Stmt {

	/**
	 * Contains declares
	 *
	 * @var PHPParser_Node_Stmt_DeclareDeclare[]
	 */
	protected $declares = array();

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Constructs a declare node.
	 *
	 * @param PHPParser_Node_Stmt_DeclareDeclare[] $declares List of declares
	 * @param PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $declares, array $stmts, $line = -1, $ignorables = array()) {
		$this->setDeclares($declares);
		$this->setStmts($stmts);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Stmt_DeclareDeclare[] $declares */
	public function setDeclares(array $declares) {
		$this->declares = $declares;
	}

	/**
	 * @return PHPParser_Node_Stmt_DeclareDeclare[]
	 */
	public function getDeclares() {
		return $this->declares;
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