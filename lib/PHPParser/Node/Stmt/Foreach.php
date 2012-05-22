<?php

/**
 * @property PHPParser_Node_Expr      $expr     Expression to iterate
 * @property null|PHPParser_Node_Expr $keyVar   Variable to assign key to
 * @property bool                     $byRef    Whether to assign value by reference
 * @property PHPParser_Node_Expr      $valueVar Variable to assign value to
 * @property PHPParser_Node[]         $stmts    Statements
 */
class PHPParser_Node_Stmt_Foreach extends PHPParser_Node_Stmt {

	/**
	 * Contains keyVar
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $keyVar;

	/**
	 * Contains byRef
	 *
	 * @var bool
	 */
	protected $byRef;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Contains expr
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $expr;

	/**
	 * Contains valueVar
	 *
	 * @var PHPParser_Node_Expr
	 */
	protected $valueVar;

	/**
	 * Constructs a foreach node.
	 *
	 * @param PHPParser_Node_Expr $expr Expression to iterate
	 * @param PHPParser_Node_Expr $valueVar Variable to assign value to
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                        'keyVar' => null   : Variable to assign key to
	 *                                        'byRef'  => false  : Whether to assign value by reference
	 *                                        'stmts'  => array(): Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Expr $expr, PHPParser_Node_Expr $valueVar, array $subNodes = array(), $line = -1, $ignorables = array()) {
		$this->setExpr($expr);
		$this->setValueVar($valueVar);
		if (isset($subNodes['keyVar']) && NULL !== $subNodes['keyVar']) {
			$this->setKeyVar($subNodes['keyVar']);
		}
		if (isset($subNodes['byRef']) && NULL !== $subNodes['byRef']) {
			$this->setByRef($subNodes['byRef']);
		}
		if (isset($subNodes['stmts']) && NULL !== $subNodes['stmts']) {
			$this->setStmts($subNodes['stmts']);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param bool $byRef */
	public function setByRef($byRef) {
		$this->byRef = (bool)$byRef;
	}

	/**
	 * @return bool
	 */
	public function getByRef() {
		return $this->byRef;
	}

	/**
	 * @param PHPParser_Node_Expr $expr */
	public function setExpr(PHPParser_Node_Expr $expr) {
		$this->expr = $expr;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getExpr() {
		return $this->expr;
	}

	/**
	 * @param PHPParser_Node_Expr $keyVar */
	public function setKeyVar(PHPParser_Node_Expr $keyVar) {
		$this->keyVar = $keyVar;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getKeyVar() {
		return $this->keyVar;
	}

	/**
	 * @param PHPParser_Node[] $stmts */
	public function setStmts(array $stmts) {
		$this->stmts = $stmts;
	}

	/**
	 * @return PHPParser_Node[]
	 */
	public function getStmts() {
		return $this->stmts;
	}

	/**
	 * @param PHPParser_Node_Expr $valueVar */
	public function setValueVar(PHPParser_Node_Expr $valueVar) {
		$this->valueVar = $valueVar;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getValueVar() {
		return $this->valueVar;
	}
}