<?php

/**
 * @property PHPParser_Node[]            $stmts   Statements
 * @property PHPParser_Node_Stmt_Catch[] $catches Catches
 */
class PHPParser_Node_Stmt_TryCatch extends PHPParser_Node_Stmt
{
    /**
     * Constructs a try catch node.
     *
     * @param PHPParser_Node[]            $stmts      Statements
     * @param PHPParser_Node_Stmt_Catch[] $catches    Catches
     * @param int                         $line       Line
     * @param null|array                  $ignorables Ignorables
     */
    public function __construct(array $stmts, array $catches, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'stmts'   => $stmts,
                'catches' => $catches,
            ),
            $line, $ignorables
        );
    }
}