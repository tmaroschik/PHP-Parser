<?php

class PHPParser_Node_Scalar_FuncConst extends PHPParser_Node_Scalar
{
    /**
     * Constructs a __FUNCTION__ const node
     *
     * @param int         $line       Line
     * @param null|string $docComment Nearest doc comment
     */
    public function __construct($line = -1, $docComment = null, $comment = null) {
        parent::__construct(array(), $line, $docComment);
    }
}