<?php

class PHPParser_Node_Expr_New extends PHPParser_Node_Expr {

	/**
	 * Class name
	 *
	 * @var PHPParser_Node_Name|PHPParser_Node_Expr
	 */
	protected $class;

	/**
	 * Arguments
	 *
	 * @var PHPParser_Node_Arg[]
	 */
	protected $args = array();

	/**
	 * Constructs a function call node.
	 *
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class Class name
	 * @param PHPParser_Node_Arg[] $args Arguments
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($class, array $args = array(), $line = -1, $ignorables = array()) {
		$this->setClass($class);
		$this->setArgs($args);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Arg[] $args */
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
	 * @param \PHPParser_Node_Expr|\PHPParser_Node_Name $class */
	public function setClass($class) {
		if (!$class instanceof PHPParser_Node_Expr && !$class instanceof PHPParser_Node_Name) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects $type to be either PHPParser_Node_Name or PHPParser_Node_Expr. ' . gettype($class) . ' given.', 1337629483);
		}
		$this->class = $class;
	}

	/**
	 * @return \PHPParser_Node_Expr|\PHPParser_Node_Name
	 */
	public function getClass() {
		return $this->class;
	}
}