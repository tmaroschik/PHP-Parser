<?php

/**
 * @property string              $key   Key
 * @property PHPParser_Node_Expr $value Value
 */
class PHPParser_Node_Stmt_DeclareDeclare extends PHPParser_Node_Stmt
{
    /**
     * Constructs a declare key=>value pair node.
     *
     * @param string              $key        Key
     * @param PHPParser_Node_Expr $value      Value
     * @param int                 $line       Line
     * @param null|array          $ignorables All Ignorables
     */
    public function __construct($key, PHPParser_Node_Expr $value, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'key'   => $key,
                'value' => $value,
            ),
            $line, $ignorables
        );
    }
}