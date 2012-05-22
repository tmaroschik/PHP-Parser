<?php

/**
 * @property string              $key   Key
 * @property PHPParser_Node_Expr $value Value
 */
class PHPParser_Node_Stmt_DeclareDeclare extends PHPParser_Node_Stmt {

	/**
	 * Contains key
	 *
	 * @var string
	 */
	protected $key;

	/**
	 * Contains value
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $value;

	/**
	 * Constructs a declare key=>value pair node.
	 *
	 * @param string $key Key
	 * @param PHPParser_Node_Expr $value Value
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct($key, PHPParser_Node_Expr $value, $line = -1, $ignorables = array()) {
		$this->setKey($key);
		$this->setValue($value);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param string $key */
	public function setKey($key) {
		$this->key = (string)$key;
	}

	/**
	 * @return string
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @param PHPParser_Node_Expr $value */
	public function setValue(PHPParser_Node_Expr $value) {
		$this->value = $value;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getValue() {
		return $this->value;
	}
}