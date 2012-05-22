<?php

class PHPParser_Node_Expr_ArrayDimFetch extends PHPParser_Node_Expr {

	/**
	 * Variable
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $var;

	/**
	 * Array index / dim
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $dim;

	/**
	 * Constructs an array index fetch node.
	 *
	 * @param PHPParser_Node_Expr $var Variable
	 * @param null|PHPParser_Node_Expr $dim Array index / dim
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $var, PHPParser_Node_Expr $dim = null, $line = -1, $ignorables = array()) {
		$this->setVar($var);
		if (NULL !== $dim) {
			$this->setDim($dim);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr $dim */
	public function setDim(PHPParser_Node_Expr $dim) {
		$this->dim = $dim;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getDim() {
		return $this->dim;
	}

	/**
	 * @param PHPParser_Node_Expr $var */
	public function setVar(PHPParser_Node_Expr $var) {
		$this->var = $var;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getVar() {
		return $this->var;
	}
}