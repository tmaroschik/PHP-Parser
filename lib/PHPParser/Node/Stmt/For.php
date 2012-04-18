<?php

/**
 * @property PHPParser_Node_Expr[] $init  Init expressions
 * @property PHPParser_Node_Expr[] $cond  Loop conditions
 * @property PHPParser_Node_Expr[] $loop  Loop expressions
 * @property PHPParser_Node[]      $stmts Statements
 */
class PHPParser_Node_Stmt_For extends PHPParser_Node_Stmt
{
    /**
     * Constructs a for loop node.
     *
     * @param array       $subNodes   Array of the following optional subnodes:
     *                                'init'  => array(): Init expressions
     *                                'cond'  => array(): Loop conditions
     *                                'loop'  => array(): Loop expressions
     *                                'stmts' => array(): Statements
     * @param int         $line       Line
     * @param null|array  $ignorables Ignorables
     */
    public function __construct(array $subNodes = array(), $line = -1, $ignorables = null) {
        parent::__construct(
            $subNodes + array(
                'init'  => array(),
                'cond'  => array(),
                'loop'  => array(),
                'stmts' => array(),
            ),
            $line, $ignorables
        );
    }
}