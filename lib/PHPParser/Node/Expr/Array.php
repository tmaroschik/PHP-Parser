<?php

/**
 * @property PHPParser_Node_Expr_ArrayItem[] $items Items
 */
class PHPParser_Node_Expr_Array extends PHPParser_Node_Expr
{
    /**
     * Constructs an array node.
     *
     * @param PHPParser_Node_Expr_ArrayItem[] $items      Items of the array
     * @param int                             $line       Line
     * @param null|array                      $ignorables All Ignorables
     */
    public function __construct(array $items = array(), $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'items' => $items
            ),
            $line, $ignorables
        );
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
}