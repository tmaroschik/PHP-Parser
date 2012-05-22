<?php

/**
 * @property PHPParser_Node_Stmt_UseUse[] $uses Aliases
 */
class PHPParser_Node_Stmt_Use extends PHPParser_Node_Stmt {

	/**
	 * Contains uses
	 *
	 * @var PHPParser_Node_Stmt_UseUse[]
	 */
	protected $uses;

	/**
	 * Constructs an alias (use) list node.
	 *
	 * @param PHPParser_Node_Stmt_UseUse[] $uses Aliases
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $uses, $line = -1, $ignorables = array()) {
		$this->setUses($uses);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Stmt_UseUse[] $uses */
	public function setUses(array $uses) {
		$this->uses = $uses;
	}

	/**
	 * @return PHPParser_Node_Stmt_UseUse[]
	 */
	public function getUses() {
		return $this->uses;
	}
}