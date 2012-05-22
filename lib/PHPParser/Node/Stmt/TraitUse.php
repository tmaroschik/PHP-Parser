<?php

/**
 * @property PHPParser_Node_Name[]               $traits      Traits
 * @property PHPParser_Node_TraitUseAdaptation[] $adaptations Adaptations
 */
class PHPParser_Node_Stmt_TraitUse extends PHPParser_Node_Stmt {

	/**
	 * Contains traits
	 *
	 * @var PHPParser_Node_Name[]
	 */
	protected $traits;

	/**
	 * Contains adaptations
	 *
	 * @var PHPParser_Node_TraitUseAdaptation[]
	 */
	protected $adaptations;

	/**
	 * Constructs a trait use node.
	 *
	 * @param PHPParser_Node_Name[] $traits Traits
	 * @param PHPParser_Node_TraitUseAdaptation[] $adaptations Adaptations
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(array $traits, array $adaptations = array(), $line = -1, $ignorables = array()) {
		$this->setTraits($traits);
		$this->setAdaptations($adaptations);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @param PHPParser_Node_TraitUseAdaptation[] $adaptations */
	public function setAdaptations(array $adaptations) {
		$this->adaptations = $adaptations;
	}

	/**
	 * @return PHPParser_Node_TraitUseAdaptation[]
	 */
	public function getAdaptations() {
		return $this->adaptations;
	}

	/**
	 * @param PHPParser_Node_Name[] $traits */
	public function setTraits(array $traits) {
		$this->traits = $traits;
	}

	/**
	 * @return PHPParser_Node_Name[]
	 */
	public function getTraits() {
		return $this->traits;
	}
}