<?php

class PHPParser_Node_Expr_MethodCall extends PHPParser_Node_Expr {

	/**
	 * Variable holding object
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $var;

	/**
	 * Method name
	 *
	 * @var string|PHPParser_Node_Expr
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
	 * @param PHPParser_Node_Expr $var Variable holding object
	 * @param string|PHPParser_Node_Expr $name Method name
	 * @param PHPParser_Node_Arg[] $args Arguments
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $var, $name, array $args = array(), $line = -1, $ignorables = array()) {
		$this->setVar($var);
		$this->setName($name);
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
	 * @param \PHPParser_Node_Expr|string $name */
	public function setName($name) {
		if (!is_string($name) && !$name instanceof PHPParser_Node_Expr) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects $type to be either string or PHPParser_Node_Expr. ' . gettype($name) . ' given.', 1337629298);
		}
		$this->name = $name;
	}

	/**
	 * @return \PHPParser_Node_Expr|string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param \PHPParser_Node_Expr $var */
	public function setVar(PHPParser_Node_Expr $var) {
		$this->var = $var;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getVar() {
		return $this->var;
	}
}