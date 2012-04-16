<?php

/**
 * @property PHPParser_Node_Expr $expr Expression
 */
class PHPParser_Node_Expr_BitwiseNot extends PHPParser_Node_Expr
{
    /**
     * Constructs a bitwise not node.
     *
     * @param PHPParser_Node_Expr $expr       Expression
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct(PHPParser_Node_Expr $expr, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'expr' => $expr
            ),
            $line, $ignorables
        );
    }
}