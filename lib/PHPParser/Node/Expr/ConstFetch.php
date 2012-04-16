<?php

/**
 * @property PHPParser_Node_Name $name Constant name
 */
class PHPParser_Node_Expr_ConstFetch extends PHPParser_Node_Expr
{
    /**
     * Constructs a const fetch node.
     *
     * @param PHPParser_Node_Name $name       Constant name
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct(PHPParser_Node_Name $name, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'name'  => $name
            ),
            $line, $ignorables
        );
    }
}