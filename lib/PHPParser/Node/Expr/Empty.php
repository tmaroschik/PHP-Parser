<?php

/**
 * @property PHPParser_Node_Expr $var Variable
 */
class PHPParser_Node_Expr_Empty extends PHPParser_Node_Expr
{
    /**
     * Constructs an empty() node.
     *
     * @param PHPParser_Node_Expr $var        Variable
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct(PHPParser_Node_Expr $var, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'var' => $var
            ),
            $line, $ignorables
        );
    }
}