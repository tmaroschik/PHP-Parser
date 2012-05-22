<?php

class PHPParser_Node_Expr_Ternary extends PHPParser_Node_Expr {

	/**
	 * Contains cond
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $cond;

	/**
	 * Contains if
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $if;

	/**
	 * Contains else
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $else;

	/**
	 * Constructs a ternary operator node.
	 *
	 * @param PHPParser_Node_Expr $cond Condition
	 * @param null|PHPParser_Node_Expr $if Expression for true
	 * @param PHPParser_Node_Expr $else Expression for false
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $cond, $if, PHPParser_Node_Expr $else, $line = -1, $ignorables = array()) {
		$this->setCond($cond);
		if (NULL !== $if) {
			$this->setIf($if);
		}
		$this->setElse($else);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr $cond */
	public function setCond(PHPParser_Node_Expr $cond) {
		$this->cond = $cond;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getCond() {
		return $this->cond;
	}

	/**
	 * @param PHPParser_Node_Expr $else */
	public function setElse(PHPParser_Node_Expr $else) {
		$this->else = $else;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getElse() {
		return $this->else;
	}

	/**
	 * @param PHPParser_Node_Expr $if */
	public function setIf(PHPParser_Node_Expr $if) {
		$this->if = $if;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getIf() {
		return $this->if;
	}
}