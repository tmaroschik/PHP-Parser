<?php

/**
 * @property bool                   $byRef  Whether returns by reference
 * @property string                 $name   Name
 * @property PHPParser_Node_Param[] $params Parameters
 * @property PHPParser_Node[]       $stmts  Statements
 */
class PHPParser_Node_Stmt_Function extends PHPParser_Node_Stmt {

	/**
	 * Contains byRef
	 *
	 * @var bool
	 */
	protected $byRef;

	/**
	 * Contains params
	 *
	 * @var PHPParser_Node_Param[]
	 */
	protected $params;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Contains name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Constructs a function node.
	 *
	 * @param string $name Name
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                'byRef'  => false  : Whether to return by reference
	 *                                'params' => array(): Parameters
	 *                                'stmts'  => array(): Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($name, array $subNodes = array(), $line = -1, $ignorables = array()) {
		$this->setName($name);
		if (isset($subNodes['byRef']) && NULL !== $subNodes['byRef']) {
			$this->setByRef($subNodes['byRef']);
		}
		if (isset($subNodes['params']) && NULL !== $subNodes['params']) {
			$this->setParams($subNodes['params']);
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
	 * @param string $name */
	public function setName($name) {
		$this->name = (string)$name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param PHPParser_Node_Param[] $params */
	public function setParams(array $params) {
		$this->params = $params;
	}

	/**
	 * @return PHPParser_Node_Param[]
	 */
	public function getParams() {
		return $this->params;
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