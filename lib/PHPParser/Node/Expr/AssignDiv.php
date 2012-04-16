<?php

/**
 * @property PHPParser_Node_Expr $var  Variable
 * @property PHPParser_Node_Expr $expr Expression
 */
class PHPParser_Node_Expr_AssignDiv extends PHPParser_Node_Expr
{
    /**
     * Constructs an assignment with division node.
     *
     * @param PHPParser_Node_Expr $var        Variable
     * @param PHPParser_Node_Expr $expr       Expression
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct(PHPParser_Node_Expr $var, PHPParser_Node_Expr $expr, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'var'  => $var,
                'expr' => $expr
            ),
            $line, $ignorables
        );
    }
}