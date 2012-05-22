<?php

class PHPParser_Node_Ignorable extends PHPParser_NodeAbstract {

	/**
	 * Contains value
	 *
	 * @var string
	 */
	protected $value;

	/**
	 * Constructs a const node for use in class const and const statements.
	 *
	 * @param string $name Name
	 * @param PHPParser_Node_Expr $value Value
	 * @param int $line Line
	 * @param array $ignorables All Ignorables
	 */
	public function __construct($value, $line = -1) {
		$this->setValue($value);
		parent::__construct($line);
	}

	/**
	 * Returns a string representation of the ignorable.
	 *
	 * @return string String representation
	 */
	public function toString() {
		return $this->value;
	}

	/**
	 * Returns a string representation of the ignorable.
	 * namespace separator.
	 *
	 * @return string String representation
	 */
	public function __toString() {
		return $this->toString();
	}

	/**
	 * @param string $value */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getValue() {
		return $this->value;
	}

}
