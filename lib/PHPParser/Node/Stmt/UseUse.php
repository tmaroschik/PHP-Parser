<?php

/**
 * @property PHPParser_Node_Name $name  Namespace/Class to alias
 * @property string              $alias Alias
 */
class PHPParser_Node_Stmt_UseUse extends PHPParser_Node_Stmt {

	/**
	 * Contains name
	 *
	 * @var PHPParser_Node_Name
	 */
	protected $name;

	/**
	 * Contains alias
	 *
	 * @var string
	 */
	protected $alias;

	/**
	 * Constructs an alias (use) node.
	 *
	 * @param PHPParser_Node_Name $name Namespace/Class to alias
	 * @param null|string $alias Alias
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(PHPParser_Node_Name $name, $alias = null, $line = -1, $ignorables = array()) {
		if (null === $alias) {
			$alias = $name->getLast();
		}
		$this->setName($name);
		$this->setAlias($alias);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param string $alias */
	public function setAlias($alias) {
		if ('self' == $alias || 'parent' == $alias) {
			throw new PHPParser_Error(sprintf(
				'Cannot use "%s" as "%s" because "%2$s" is a special class name',
				$this->name, $alias
			));
		}
		$this->alias = $alias;
	}

	/**
	 * @return string
	 */
	public function getAlias() {
		return $this->alias;
	}

	/**
	 * @param PHPParser_Node_Name $name */
	public function setName(PHPParser_Node_Name $name) {
		$this->name = $name;
	}

	/**
	 * @return PHPParser_Node_Name
	 */
	public function getName() {
		return $this->name;
	}
}