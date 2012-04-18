<?php

/**
 * @property PHPParser_Node_Stmts_StaticVar[] $vars Variable definitions
 */
class PHPParser_Node_Stmt_Static extends PHPParser_Node_Stmt
{
    /**
     * Constructs a static variables list node.
     *
     * @param PHPParser_Node_Stmts_StaticVar[] $vars       Variable definitions
     * @param int                              $line       Line
     * @param null|array                       $ignorables Ignorables
     */
    public function __construct(array $vars, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'vars' => $vars,
            ),
            $line, $ignorables
        );
    }
}