<?php

/**
 * @property string              $name  Name
 * @property PHPParser_Node_Expr $value Value
 */
class PHPParser_Node_Const extends PHPParser_NodeAbstract
{
    /**
     * Constructs a const node for use in class const and const statements.
     *
     * @param string              $name       Name
     * @param PHPParser_Node_Expr $value      Value
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct($name, PHPParser_Node_Expr $value, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'name'  => $name,
                'value' => $value,
            ),
            $line, $ignorables
        );
    }
}