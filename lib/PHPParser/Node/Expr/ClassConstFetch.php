<?php

class PHPParser_Node_Expr_ClassConstFetch extends PHPParser_Node_Expr {

	/**
	 * Class name
	 *
	 * @var PHPParser_Node_Name|PHPParser_Node_Expr
	 */
	protected $class;

	/**
	 * Constant name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Constructs a class const fetch node.
	 *
	 * @param PHPParser_Node_Name|PHPParser_Node_Expr $class Class name
	 * @param string $name Constant name
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct($class, $name, $line = -1, $ignorables = array()) {
		$this->setClass($class);
		$this->setName($name);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param \PHPParser_Node_Expr|\PHPParser_Node_Name $class */
	public function setClass($class) {
		if (!$class instanceof PHPParser_Node_Expr && !$class instanceof PHPParser_Node_Name) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects $type to be either PHPParser_Node_Expr or PHPParser_Node_Name. ' . gettype($class) . ' given.', 1337628264);
		}
		$this->class = $class;
	}

	/**
	 * @return \PHPParser_Node_Expr|\PHPParser_Node_Name
	 */
	public function getClass() {
		return $this->class;
	}

	/**
	 * @param string $name */
	public function setName($name) {
		$this->name = (string)$name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}
}