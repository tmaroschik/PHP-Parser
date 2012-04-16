<?php

class PHPParser_Node_Scalar_LineConst extends PHPParser_Node_Scalar
{
    /**
     * Constructs a __LINE__ const node
     *
     * @param int         $line       Line
     * @param null|string $docComment Nearest doc comment
     */
    public function __construct($line = -1, $ignorables = null) {
        parent::__construct(array(), $line, $docComment);
    }
}