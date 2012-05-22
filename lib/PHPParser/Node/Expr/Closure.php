<?php

class PHPParser_Node_Expr_Closure extends PHPParser_Node_Expr {

	/**
	 * Whether the closure is static
	 *
	 * @var bool
	 */
	protected $static = false;

	/**
	 * Whether to return by reference
	 *
	 * @var bool
	 */
	protected $byRef = false;

	/**
	 * Parameters
	 *
	 * @var PHPParser_Node_Stmt_FuncParam[]
	 */
	protected $params = array();

	/**
	 * use()s
	 *
	 * @var PHPParser_Node_Expr_ClosureUse[]
	 */
	protected $uses = array();

	/**
	 * Statements
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Constructs a lambda function node.
	 *
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                'stmts'  => array(): Statements
	 *                                'params' => array(): Parameters
	 *                                'uses'   => array(): use()s
	 *                                'byRef'  => false  : Whether to return by reference
	 *                                'static' => false  : Whether the closure is static
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(array $subNodes = array(), $line = -1, $ignorables = array()) {
		if (isset($subNodes['stmts']) && NULL !== $subNodes['stmts']) {
			$this->setStmts($subNodes['stmts']);
		}
		if (isset($subNodes['params']) && NULL !== $subNodes['params']) {
			$this->setParams($subNodes['params']);
		}
		if (isset($subNodes['uses']) && NULL !== $subNodes['uses']) {
			$this->setUses($subNodes['uses']);
		}
		if (isset($subNodes['byRef']) && NULL !== $subNodes['byRef']) {
			$this->setByRef($subNodes['byRef']);
		}
		if (isset($subNodes['static']) && NULL !== $subNodes['static']) {
			$this->setStatic($subNodes['static']);
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
	 * @param PHPParser_Node_Stmt_FuncParam[] $params */
	public function setParams(array $params) {
		$this->params = $params;
	}

	/**
	 * @return PHPParser_Node_Stmt_FuncParam[]
	 */
	public function getParams() {
		return $this->params;
	}

	/**
	 * @param boolean $static */
	public function setStatic($static) {
		$this->static = (bool)$static;
	}

	/**
	 * @return boolean
	 */
	public function getStatic() {
		return $this->static;
	}

	/**
	 * @param PHPParser_Node[] $stmts */
	public function setStmts(array$stmts) {
		$this->stmts = $stmts;
	}

	/**
	 * @return PHPParser_Node[]
	 */
	public function getStmts() {
		return $this->stmts;
	}

	/**
	 * @param PHPParser_Node_Expr_ClosureUse[] $uses */
	public function setUses(array $uses) {
		$this->uses = $uses;
	}

	/**
	 * @return PHPParser_Node_Expr_ClosureUse[]
	 */
	public function getUses() {
		return $this->uses;
	}
}