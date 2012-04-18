<?php

/**
 * @property PHPParser_Node_Expr[] $vars Variables
 */
class PHPParser_Node_Expr_Isset extends PHPParser_Node_Expr
{
    /**
     * Constructs an array node.
     *
     * @param PHPParser_Node_Expr[] $vars       Variables
     * @param int                   $line       Line
     * @param null|array            $ignorables Ignorables
     */
    public function __construct(array $vars, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'vars' => $vars
            ),
            $line, $ignorables
        );
    }
}