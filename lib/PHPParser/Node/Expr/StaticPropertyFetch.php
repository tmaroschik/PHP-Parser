<?php

class PHPParser_Node_Expr_StaticPropertyFetch extends PHPParser_Node_Expr {

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
	 * Constructs a static property fetch node.
	 *
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class Class name
	 * @param string|PHPParser_Node_Expr $name Property name
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($class, $name, $line = -1, $ignorables = array()) {
		$this->setClass($class);
		$this->setName($name);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class */
	public function setClass($class) {
		if (!$class instanceof PHPParser_Node_Name && !$class instanceof PHPParser_Node_Expr) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects type to be either PHPParser_Node_Name or PHPParser_Node_Expr. ' . gettype($class) . ' given.', 1337626542);
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
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects type to be either string or PHPParser_Node_Expr. ' . gettype($name) . ' given.', 1337626570);
		}
		$this->name = $name;
	}

	/**
	 * @return string|PHPParser_Node_Expr
	 */
	public function getName() {
		return $this->name;
	}
}