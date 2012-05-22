<?php

/**
 * @property string           $name  Name
 * @property PHPParser_Node[] $stmts Statements
 */
class PHPParser_Node_Stmt_Trait extends PHPParser_Node_Stmt {

	/**
	 * Contains name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Constructs a trait node.
	 *
	 * @param string $name Name
	 * @param PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($name, array $stmts = array(), $line = -1, $ignorables = array()) {
		$this->setName($name);
		$this->setStmts($stmts);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param string $name */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
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