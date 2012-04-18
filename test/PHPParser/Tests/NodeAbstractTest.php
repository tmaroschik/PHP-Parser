<?php

class PHPParser_Tests_NodeAbstractTest extends PHPUnit_Framework_TestCase
{
    public function testConstruct() {
        $node = $this->getMockForAbstractClass(
            'PHPParser_NodeAbstract',
            array(
                array(
                    'subNode' => 'value'
                ),
                10,
                new PHPParser_Node_Ignorable_DocComment('/** doc comment */')
            ),
            'PHPParser_Node_Dummy'
        );

        $this->assertEquals('Dummy', $node->getType());
        $this->assertEquals(array('subNode'), $node->getSubNodeNames());
        $this->assertEquals(10, $node->getLine());
        foreach ($node->getIgnorables() as $ignorable) {
            if ($ignorable instanceof PHPParser_Node_Ignorable_DocComment) {
                $this->assertEquals('/** doc comment */', $ignorable->value);
            }
        }
        $this->assertEquals('value', $node->subNode);
        $this->assertTrue(isset($node->subNode));

        return $node;
    }

    /**
     * @depends testConstruct
     */
    public function testChange(PHPParser_Node $node) {
        // change of line
        $node->setLine(15);
        $this->assertEquals(15, $node->getLine());

        // change of doc comment
        $node->setIgnorables('/** other doc comment */');
        $this->assertEquals('/** other doc comment */', $node->getIgnorables());

        // direct modification
        $node->subNode = 'newValue';
        $this->assertEquals('newValue', $node->subNode);

        // indirect modification
        $subNode =& $node->subNode;
        $subNode = 'newNewValue';
        $this->assertEquals('newNewValue', $node->subNode);

        // removal
        unset($node->subNode);
        $this->assertFalse(isset($node->subNode));
    }
}