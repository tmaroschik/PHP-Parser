<?php

/**
 * @property int                                    $type  Modifiers
 * @property PHPParser_Node_Stmt_PropertyProperty[] $props Properties
 */
class PHPParser_Node_Stmt_Property extends PHPParser_Node_Stmt {

	/**
	 * Contains type
	 *
	 * @var int
	 */
	protected $type;

	/**
	 * Contains props
	 *
	 * @var PHPParser_Node_Stmt_PropertyProperty[]
	 */
	protected $props;

	/**
	 * Constructs a class property list node.
	 *
	 * @param int $type Modifiers
	 * @param PHPParser_Node_Stmt_PropertyProperty[] $props Properties
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct($type, array $props, $line = -1, $ignorables = array()) {
		$this->setType($type);
		$this->setProps($props);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Stmt_PropertyProperty[] $props */
	public function setProps(array $props) {
		$this->props = $props;
	}

	/**
	 * @return PHPParser_Node_Stmt_PropertyProperty[]
	 */
	public function getProps() {
		return $this->props;
	}

	/**
	 * @param int $type */
	public function setType($type) {
		$this->type = (int)$type;
	}

	/**
	 * @return int
	 */
	public function getType() {
		return $this->type;
	}
}