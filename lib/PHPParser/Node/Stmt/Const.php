<?php

/**
 * @property PHPParser_Node_Const[] $consts Constant declarations
 */
class PHPParser_Node_Stmt_Const extends PHPParser_Node_Stmt {

	/**
	 * Contains consts
	 *
	 * @var PHPParser_Node_Const[]
	 */
	protected $consts;

	/**
	 * Constructs a const list node.
	 *
	 * @param PHPParser_Node_Const[] $consts Constant declarations
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $consts, $line = -1, $ignorables = array()) {
		$this->setConsts($consts);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Const[] $consts */
	public function setConsts(array $consts) {
		$this->consts = $consts;
	}

	/**
	 * @return PHPParser_Node_Const[]
	 */
	public function getConsts() {
		return $this->consts;
	}
}