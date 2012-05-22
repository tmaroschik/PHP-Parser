<?php

class PHPParser_Node_Expr_ArrayItem extends PHPParser_Node_Expr {

	/**
	 * Key
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $key;

	/**
	 * Value
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $value;

	/**
	 * Whether to assign by reference
	 *
	 * @var bool
	 */
	protected $byRef;

	/**
	 * Constructs an array item node.
	 *
	 * @param PHPParser_Node_Expr $value Value
	 * @param null|PHPParser_Node_Expr $key Key
	 * @param bool $byRef Whether to assign by reference
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $value, PHPParser_Node_Expr $key = null, $byRef = false, $line = -1, $ignorables = array()) {
		$this->setValue($value);
		if (NULL !== $key) {
			$this->setKey($key);
		}
		if (NULL !== $byRef) {
			$this->setByRef($byRef);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param boolean $byRef */
	public function setByRef($byRef) {
		$this->byRef = (bool)$byRef;
	}

	/**
	 * @return boolean
	 */
	public function getByRef() {
		return $this->byRef;
	}

	/**
	 * @param \PHPParser_Node_Expr $key */
	public function setKey(PHPParser_Node_Expr $key) {
		$this->key = $key;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getKey() {
		return $this->key;
	}

	/**
	 * @param \PHPParser_Node_Expr $value */
	public function setValue(PHPParser_Node_Expr $value) {
		$this->value = $value;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getValue() {
		return $this->value;
	}
}