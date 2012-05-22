<?php

/**
 * @property PHPParser_Node_Name   $trait     Trait name
 * @property string                $method    Method name
 * @property PHPParser_Node_Name[] $insteadof Overwritten traits
 */
class PHPParser_Node_Stmt_TraitUseAdaptation_Precedence extends PHPParser_Node_Stmt_TraitUseAdaptation {

	/**
	 * Contains trait
	 *
	 * @var PHPParser_Node_Name
	 */
	protected $trait;

	/**
	 * Contains method
	 *
	 * @var string
	 */
	protected $method;

	/**
	 * Contains insteadof
	 *
	 * @var PHPParser_Node_Name[]
	 */
	protected $insteadof = array();

	/**
	 * Constructs a trait use precedence adaptation node.
	 *
	 * @param PHPParser_Node_Name $trait Trait name
	 * @param string $method Method name
	 * @param PHPParser_Node_Name[] $insteadof Overwritten traits
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Name $trait, $method, array $insteadof, $line = -1, $ignorables = array()) {
		$this->setTrait($trait);
		$this->setMethod($method);
		$this->setInsteadof($insteadof);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_Name[] $insteadof */
	public function setInsteadof(array $insteadof) {
		$this->insteadof = $insteadof;
	}

	/**
	 * @return PHPParser_Node_Name[]
	 */
	public function getInsteadof() {
		return $this->insteadof;
	}

	/**
	 * @param string $method */
	public function setMethod($method) {
		$this->method = (string)$method;
	}

	/**
	 * @return string
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * @param PHPParser_Node_Name $trait */
	public function setTrait(PHPParser_Node_Name $trait) {
		$this->trait = $trait;
	}

	/**
	 * @return PHPParser_Node_Name
	 */
	public function getTrait() {
		return $this->trait;
	}
}