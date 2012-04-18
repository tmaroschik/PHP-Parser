<?php

/**
 * @property PHPParser_Node_Expr        $cond  Condition
 * @property PHPParser_Node_Stmt_Case[] $cases Case list
 */
class PHPParser_Node_Stmt_Switch extends PHPParser_Node_Stmt
{
    /**
     * Constructs a case node.
     *
     * @param PHPParser_Node_Expr        $cond       Condition
     * @param PHPParser_Node_Stmt_Case[] $cases      Case list
     * @param int                        $line       Line
     * @param null|array                 $ignorables Ignorables
     */
    public function __construct(PHPParser_Node_Expr $cond, array $cases, $line = -1, $ignorables = null) {
        parent::__construct(
            array(
                'cond'  => $cond,
                'cases' => $cases,
            ),
            $line, $ignorables
        );
    }
}