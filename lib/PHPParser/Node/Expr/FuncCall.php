<?php

class PHPParser_Node_Expr_FuncCall extends PHPParser_Node_Expr {

	/**
	 * Function name
	 *
	 * @var PHPParser_Node_Name|PHPParser_Node_Expr
	 */
	protected $name;

	/**
	 * Arguments
	 *
	 * @var PHPParser_Node_Arg[]
	 */
	protected $args = array();

	/**
	 * Constructs a function call node.
	 *
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $name Function name
	 * @param PHPParser_Node_Arg[] $args Arguments
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($name, array $args = array(), $line = -1, $ignorables = array()) {
		$this->setName($name);
		$this->setArgs($args);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Arg $args */
	public function setArgs(array $args) {
		$this->args = $args;
	}

	/**
	 * @return PHPParser_Node_Arg[]
	 */
	public function getArgs() {
		return $this->args;
	}

	/**
	 * @param \PHPParser_Node_Expr|\PHPParser_Node_Name $name */
	public function setName($name) {
		if (!$name instanceof PHPParser_Node_Expr && !$name instanceof PHPParser_Node_Name) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects $type to be either PHPParser_Node_Expr or PHPParser_Node_Name. ' . gettype($name) . ' given.', 1337628890);
		}
		$this->name = $name;
	}

	/**
	 * @return \PHPParser_Node_Expr|\PHPParser_Node_Name
	 */
	public function getName() {
		return $this->name;
	}
}