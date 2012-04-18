<?php

class PHPParser_Node_Scalar_NSConst extends PHPParser_Node_Scalar
{
    /**
     * Constructs a __NAMESPACE__ const node
     *
     * @param int         $line       Line
     * @param null|array  $ignorables Ignorables
     */
    public function __construct($line = -1, $ignorables = null) {
        parent::__construct(array(), $line, $ignorables);
    }
}