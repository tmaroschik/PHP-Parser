<?php

/**
 * @property string                          $name    Name
 * @property null|PHPParser_Node_Expr        $default Default value
 * @property null|string|PHPParser_Node_Name $type    Typehint
 * @property bool                            $byRef   Whether is passed by reference
 */
class PHPParser_Node_Param extends PHPParser_NodeAbstract {

	/**
	 * Contains name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * Contains default
	 *
	 * @var null|PHPParser_Node_Expr
	 */
	protected $default;

	/**
	 * Contains type
	 *
	 * @var null|string|PHPParser_Node_Name
	 */
	protected $type;

	/**
	 * Contains byRef
	 *
	 * @var bool
	 */
	protected $byRef;

	/**
	 * Constructs a parameter node.
	 *
	 * @param string $name Name
	 * @param null|PHPParser_Node_Expr $default Default value
	 * @param null|string|PHPParser_Node_Name $type Typehint
	 * @param bool $byRef Whether is passed by reference
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct($name, $default = null, $type = null, $byRef = false, $line = -1, $ignorables = array()) {
		$this->name = $name;
		if (NULL !== $default) {
			$this->setDefault($default);
		}
		if (NULL !== $type) {
			$this->setType($type);
		}
		$this->setByRef($byRef);
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
	 * @param PHPParser_Node_Expr $default */
	public function setDefault($default) {
		$this->default = $default;
	}

	/**
	 * @return PHPParser_Node_Expr
	 */
	public function getDefault() {
		return $this->default;
	}

	/**
	 * @param string $name */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string|PHPParser_Node_Name $type */
	public function setType($type) {
		if (!is_string($type) && !$type instanceof PHPParser_Node_Name) {
			throw new InvalidArgumentException(__CLASS__ . '::' . __METHOD__ . ' expects $type to be either string or PHPParser_Node_Name. ' . gettype($type) . ' given.', 1337618982);
		}
		$this->type = $type;
	}

	/**
	 * @return null|PHPParser_Node_Name|string
	 */
	public function getType() {
		return $this->type;
	}
}