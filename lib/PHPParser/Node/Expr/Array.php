<?php

class PHPParser_Node_Expr_Array extends PHPParser_Node_Expr {

	/**
	 * Contains items
	 *
	 * @var PHPParser_Node_Expr_ArrayItem[]
	 */
	protected $items = array();

	/**
	 * Constructs an array node.
	 *
	 * @param PHPParser_Node_Expr_ArrayItem[] $items Items of the array
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables All Ignorables
	 */
	public function __construct(array $items = array(), $line = -1, $ignorables = array()) {
		$this->setItems($items);
		parent::__construct($line, $ignorables);
	}

	/**
	 * @return bool
	 */
	public function itemsHaveLineBreaks() {
		if (null !== $this->items) {
			foreach ($this->items as $item) {
				if ($item->hasLineBreaks()) {
					return true;
				} elseif ($item->value instanceof PHPParser_Node_Expr_Array) {
					return $item->value->itemsHaveLineBreaks();
				}
			}
		}
		return false;
	}

	/**
	 * @param PHPParser_Node_Expr_ArrayItem[] $items */
	public function setItems(array $items) {
		$this->items = $items;
	}

	/**
	 * @return PHPParser_Node_Expr_ArrayItem[]
	 */
	public function getItems() {
		return $this->items;
	}
}