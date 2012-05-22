<?php

abstract class PHPParser_Node_Expr_AbstractLeftRight extends PHPParser_Node_Expr {

	/**
	 * The left hand side expression
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $left;

	/**
	 * The right hand side expression
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $right;

	/**
	 * Constructs a smaller than comparison node.
	 *
	 * @param PHPParser_Node_Expr $left The left hand side expression
	 * @param PHPParser_Node_Expr $right The right hand side expression
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $left, PHPParser_Node_Expr $right, $line = -1, $ignorables = array()) {
		$this->setLeft($left);
		$this->setRight($right);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param \PHPParser_Node_Expr $left */
	public function setLeft(PHPParser_Node_Expr $left) {
		$this->left = $left;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getLeft() {
		return $this->left;
	}

	/**
	 * @param \PHPParser_Node_Expr $right */
	public function setRight(PHPParser_Node_Expr $right) {
		$this->right = $right;
	}

	/**
	 * @return \PHPParser_Node_Expr
	 */
	public function getRight() {
		return $this->right;
	}
}