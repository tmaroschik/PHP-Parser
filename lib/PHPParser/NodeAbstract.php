<?php

abstract class PHPParser_NodeAbstract implements PHPParser_Node, IteratorAggregate
{
    protected $subNodes;
    protected $line;
    protected $ignorables;
    protected $attributes;

    /**
     * Creates a Node.
     *
     * @param array       $subNodes   Array of sub nodes
     * @param int         $line       Line
     * @param null|array  $ignorables all ignorables
     */
    public function __construct(array $subNodes, $line = -1, $ignorables = null) {
        $this->subNodes   = $subNodes;
        $this->line       = $line;
        $this->ignorables = $ignorables;
        $this->attributes = array();
    }

    /**
     * Gets the type of the node.
     *
     * @return string Type of the node
     */
    public function getType() {
        return substr(get_class($this), 15);
    }

    /**
     * Gets the names of the sub nodes.
     *
     * @return array Names of sub nodes
     */
    public function getSubNodeNames() {
        return array_keys($this->subNodes);
    }

    /**
     * Gets line the node started in.
     *
     * @return int Line
     */
    public function getLine() {
        return $this->line;
    }

    /**
     * Sets line the node started in.
     *
     * @param int $line Line
     */
    public function setLine($line) {
        $this->line = (int) $line;
    }

    /**
     * Gets the Ignorables
     *
     * @return null|array Ignorables
     */
    public function getIgnorables() {
        return $this->ignorables;
    }

    /**
     * Sets the Ignorables
     *
     * @param null|array  $ignorables Ignorables
     */
    public function setIgnorables($ignorables) {
        $this->ignorables = $ignorables;
    }

    /**
     * @param PHPParser_Node_Ignorable $ignorable
     */
    public function addIgnorable(PHPParser_Node_Ignorable $ignorable) {
        if (!is_array($this->ignorables)) {
            $this->ignorables = array();
        }
        $this->ignorables[] = $ignorable;
    }

    /**
     * @return bool
     */
    public function hasLineBreaks() {
        if (null !== $this->ignorables) {
            foreach ($this->ignorables as $ignorable) {
                if ($ignorable instanceof PHPParser_Node_Ignorable_Whitespace && strpos($ignorable->value, PHP_EOL) !== false) {
                    return true;
                }
            }
        }
        return false;
    }

    /**
     * @inheritDoc
     */
    public function setAttribute($key, $value) {
        $this->attributes[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public function hasAttribute($key) {
        return array_key_exists($key, $this->attributes);
    }

    /**
     * @inheritDoc
     */
    public function getAttribute($key, $default = null) {
        return array_key_exists($key, $this->attributes) ? $this->attributes[$key] : $default;
    }

    /**
     * @inheritDoc
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /* Magic interfaces */

    public function &__get($name) {
        return $this->subNodes[$name];
    }
    public function __set($name, $value) {
        $this->subNodes[$name] = $value;
    }
    public function __isset($name) {
        return isset($this->subNodes[$name]);
    }
    public function __unset($name) {
        unset($this->subNodes[$name]);
    }
    public function getIterator() {
        return new ArrayIterator($this->subNodes);
    }
}