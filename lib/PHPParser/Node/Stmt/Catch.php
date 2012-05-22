<?php

/**
 * @property PHPParser_Node_Name $type  Class of exception
 * @property string              $var   Variable for exception
 * @property PHPParser_Node[]    $stmts Statements
 */
class PHPParser_Node_Stmt_Catch extends PHPParser_Node_Stmt {

	/**
	 * Contains type
	 *
	 * @var PHPParser_Node_Name
	 */
	protected $type;

	/**
	 * Contains var
	 *
	 * @var string
	 */
	protected $var;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Constructs a catch node.
	 *
	 * @param PHPParser_Node_Name $type Class of exception
	 * @param string $var Variable for exception
	 * @param PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Name $type, $var, array $stmts = array(), $line = -1, $ignorables = array()) {
		$this->setType($type);
		$this->setVar($var);
		$this->setStmts($stmts);
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
	 * @param PHPParser_Node_Name $type */
	public function setType(PHPParser_Node_Name $type) {
		$this->type = $type;
	}

	/**
	 * @return PHPParser_Node_Name
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $var */
	public function setVar($var) {
		$this->var = (string)$var;
	}

	/**
	 * @return string
	 */
	public function getVar() {
		return $this->var;
	}
}