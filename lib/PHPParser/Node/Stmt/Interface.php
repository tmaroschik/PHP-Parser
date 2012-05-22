<?php

/**
 * @property string                $name    Name
 * @property PHPParser_Node_Name[] $extends Extended interfaces
 * @property PHPParser_Node[]      $stmts   Statements
 */
class PHPParser_Node_Stmt_Interface extends PHPParser_Node_Stmt {

	/**
	 * Contains extends
	 *
	 * @var PHPParser_Node_Name[]
	 */
	protected $extends = array();

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node[]
	 */
	protected $stmts = array();

	/**
	 * Contains name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * @var array
	 */
	protected static $specialNames = array(
		'self' => true,
		'parent' => true,
		'static' => true,
	);

	/**
	 * Constructs a class node.
	 *
	 * @param string $name Name
	 * @param array $subNodes Array of the following optional subnodes:
	 *                                'extends' => array(): Name of extended interfaces
	 *                                'stmts'   => array(): Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($name, array $subNodes = array(), $line = -1, $ignorables = array()) {
		parent::__construct($line, $ignorables);
		$this->setName($name);
		if (isset($subNodes['extends']) && NULL !== $subNodes['extends']) {
			$this->setExtends($subNodes['extends']);
		}
		if (isset($subNodes['stmts']) && NULL !== $subNodes['stmts']) {
			$this->setStmts($subNodes['stmts']);
		}
	}

	/**
	 * @param PHPParser_Node_Name[] $extends */
	public function setExtends(array $extends) {
		foreach ($extends as $interface) {
			$interfaceString = (string) $interface;
			if (isset(self::$specialNames[strtolower($interfaceString)])) {
				throw new PHPParser_Error('Cannot use "' . $interfaceString . '" as interface name as it is reserved', $interface->getLine());
			}
		}
		$this->extends = $extends;
	}

	/**
	 * @return PHPParser_Node_Name[]
	 */
	public function getExtends() {
		return $this->extends;
	}

	/**
	 * @param string $name */
	public function setName($name) {
		$name = (string) $name;
		if (isset(self::$specialNames[strtolower($name)])) {
			throw new PHPParser_Error('Cannot use "' . $name . '" as interface name as it is reserved', $this->getLine());
		}
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
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