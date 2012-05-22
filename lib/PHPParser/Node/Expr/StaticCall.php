<?php

class PHPParser_Node_Expr_StaticCall extends PHPParser_Node_Expr {

	/**
	 * Contains class
	 *
	 * @var PHPParser_Node_Name|PHPParser_Node_Expr
	 */
	protected $class;

	/**
	 * Contains name
	 *
	 * @var string|PHPParser_Node_Expr
	 */
	protected $name;

	/**
	 * Contains args
	 *
	 * @var PHPParser_Node_Arg[]
	 */
	protected $args = array();

	/**
	 * Constructs a static method call node.
	 *
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class Class name
	 * @param string|PHPParser_Node_Expr $name Method name
	 * @param PHPParser_Node_Arg[] $args Arguments
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($class, $name, array $args = array(), $line = -1, $ignorables = array()) {
		$this->setClass($class);
		$this->setName($name);
		$this->setArgs($args);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class */
	public function setClass($class) {
		if (!$class instanceof PHPParser_Node_Name && !$class instanceof PHPParser_Node_Expr) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects type to be either PHPParser_Node_Name or PHPParser_Node_Expr. ' . gettype($class) . ' given.', 1337626734);
		}
		$this->class = $class;
	}

	/**
	 * @return PHPParser_Node_Name|PHPParser_Node_Expr
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @param string|PHPParser_Node_Expr $name */
	public function setName($name) {
		if (!is_string($name) && !$name instanceof PHPParser_Node_Expr) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects type to be either string or PHPParser_Node_Expr. ' . gettype($name) . ' given.', 1337626739);
		}
		$this->name = $name;
	}

	/**
	 * @return string|PHPParser_Node_Expr
	 */
	public function getName() {
		return $this->name;
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
}