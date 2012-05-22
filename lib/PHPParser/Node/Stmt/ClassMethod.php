<?php

/**
 * @property int                    $type   Type
 * @property bool                   $byRef  Whether to return by reference
 * @property string                 $name   Name
 * @property PHPParser_Node_Param[] $params Parameters
 * @property PHPParser_Node[]       $stmts  Statements
 */
class PHPParser_Node_Stmt_ClassMethod extends PHPParser_Node_Stmt {

	/**
	 * Contains type
	 *
	 * @var int
	 */
	protected $type = PHPParser_Node_Stmt_Class::MODIFIER_PUBLIC;

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
	protected $params = array();

	/**
	 * Contains stmts
	 *
	 * @var null|PHPParser_Node[]
	 */
	protected $stmts;

	/**
	 * Contains name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Constructs a class method node.
	 *
	 * @param string $name Name
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                'type'   => MODIFIER_PUBLIC: Type
	 *                                'byRef'  => false          : Whether to return by reference
	 *                                'params' => array()        : Parameters
	 *                                'stmts'  => array()        : Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($name, array $subNodes = array(), $line = -1, $ignorables = array()) {
		$this->setName($name);
		if (isset($subNodes['type']) && NULL !== $subNodes['type']) {
			$this->setType($subNodes['type']);
		}
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
		$this->checkTypeAndNameConstraint($this->type, $name);
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

	/**
	 * @param int $type */
	public function setType($type) {
		$this->checkTypeAndNameConstraint($type, $this->name);
		$this->type = $type;
	}

	/**
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param int $type * @param string $name
	 * @throws PHPParser_Error
	 */
	protected function checkTypeAndNameConstraint($type, $name) {
		$type = (int)$type;
		$name = (string)$name;
		if (($type & PHPParser_Node_Stmt_Class::MODIFIER_STATIC) && ('__construct' == $name || '__destruct' == $name || '__clone' == $name)) {
			throw new PHPParser_Error(sprintf('"%s" method cannot be static', $this->name));
		}
	}
}