<?php

/**
 * @property PHPParser_Node_Expr[] $init  Init expressions
 * @property PHPParser_Node_Expr[] $cond  Loop conditions
 * @property PHPParser_Node_Expr[] $loop  Loop expressions
 * @property PHPParser_Node[]      $stmts Statements
 */
class PHPParser_Node_Stmt_For extends PHPParser_Node_Stmt {

	/**
	 * Contains init
	 *
	 * @var PHPParser_Node_Expr[]
	 */
	protected $init = array();

	/**
	 * Contains cond
	 *
	 * @var PHPParser_Node_Expr[]
	 */
	protected $cond = array();

	/**
	 * Contains loop
	 *
	 * @var PHPParser_Node_Expr[]
	 */
	protected $loop = array();

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Constructs a for loop node.
	 *
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                'init'  => array(): Init expressions
	 *                                'cond'  => array(): Loop conditions
	 *                                'loop'  => array(): Loop expressions
	 *                                'stmts' => array(): Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $subNodes = array(), $line = -1, $ignorables = array()) {
		if (isset($subNodes['init']) && NULL !== $subNodes['init']) {
			$this->setInit($subNodes['init']);
		}
		if (isset($subNodes['cond']) && NULL !== $subNodes['cond']) {
			$this->setCond($subNodes['cond']);
		}
		if (isset($subNodes['loop']) && NULL !== $subNodes['loop']) {
			$this->setLoop($subNodes['loop']);
		}
		if (isset($subNodes['stmts']) && NULL !== $subNodes['stmts']) {
			$this->setStmts($subNodes['stmts']);
		}
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Expr[] $cond */
	public function setCond(array $cond) {
		$this->cond = $cond;
	}

	/**
	 * @return PHPParser_Node_Expr[]
	 */
	public function getCond() {
		return $this->cond;
	}

	/**
	 * @param PHPParser_Node_Expr[] $init */
	public function setInit(array $init) {
		$this->init = $init;
	}

	/**
	 * @return PHPParser_Node_Expr[]
	 */
	public function getInit() {
		return $this->init;
	}

	/**
	 * @param PHPParser_Node_Expr[] $loop */
	public function setLoop(array $loop) {
		$this->loop = $loop;
	}

	/**
	 * @return PHPParser_Node_Expr[]
	 */
	public function getLoop() {
		return $this->loop;
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
}