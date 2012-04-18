<?php

/**
 * @property array $parts Encapsed string array
 */
class PHPParser_Node_Expr_ShellExec extends PHPParser_Node_Expr
{
    /**
     * Constructs a shell exec (backtick) node.
     *
     * @param array       $parts      Encapsed string array
     * @param int         $line       Line
     * @param null|array  $ignorables Ignorables
     */
    public function __construct($parts, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'parts' => $parts
            ),
            $line, $ignorables
        );
    }
}