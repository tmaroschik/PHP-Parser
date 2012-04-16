<?php

/**
 * @property string $var   Name of variable
 * @property bool   $byRef Whether to use by reference
 */
class PHPParser_Node_Expr_ClosureUse extends PHPParser_Node_Expr
{
    /**
     * Constructs a closure use node.
     *
     * @param string      $var        Name of variable
     * @param bool        $byRef      Whether to use by reference
     * @param int         $line       Line
     * @param null|array  $ignorables All Ignorables
     */
    public function __construct($var, $byRef = false, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'var'   => $var,
                'byRef' => $byRef
            ),
            $line, $ignorables
        );
    }
}