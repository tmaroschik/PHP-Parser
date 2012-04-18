<?php

/**
 * @property string|PHPParser_Node_Expr $name Name
 */
class PHPParser_Node_Expr_Variable extends PHPParser_Node_Expr
{
    /**
     * Constructs a variable node.
     *
     * @param string|PHPParser_Node_Expr $name       Name
     * @param int                        $line       Line
     * @param null|array                 $ignorables Ignorables
     */
    public function __construct($name, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                 'name' => $name
            ),
            $line, $ignorables
        );
    }
}