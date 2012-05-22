<?php

/**
 * @property null|PHPParser_Node_Expr $num Number of loops to continue
 */
class PHPParser_Node_Stmt_Continue extends PHPParser_Node_Stmt {

	/**
	 * Contains num
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $num;

	/**
	 * Constructs a continue node.
	 *
	 * @param null|PHPParser_Node_Expr $num Number of loops to continue
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $num = null, $line = -1, $ignorables = array()) {
		if (NULL !== $num) {
			$this->setNum($num);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr $num */
	public function setNum(PHPParser_Node_Expr $num) {
		$this->num = $num;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getNum() {
		return $this->num;
	}
}