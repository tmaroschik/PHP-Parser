<?php

abstract class PHPParser_NodeAbstract implements PHPParser_Node, Iterator, ArrayAccess, Countable {

	/**
	 * @var array
	 */
	static protected $reservedProperties = array(
		'line' => true,
		'ignorables' => true,
		'attribute' => true,
		'attributes' => true,
		'subNodeNames'  => true,
		'nodeType' => true,
		'parent' => true,
		'parentSubNodeName' => true
	);

	/**
	 * @var
	 */
	protected $line;

	/**
	 * @var PHPParser_Node_Ignorable[]
	 */
	protected $ignorables = array();

	/**
	 * @var array
	 */
	protected $attributes = array();

	/**
	 * @var PHPParser_Node
	 */
	protected $parent;

	/**
	 * @var string
	 */
	protected $parentSubNodeName;

	/**
	 * Contains subNodeNames
	 *
	 * @var array
	 */
	protected $subNodeNames = array();

	/**
	 * Creates a Node.
	 *
	 * @param array $subNodes Array of sub nodes
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables all ignorables
	 */
	public function __construct($line = -1, array $ignorables = array()) {
		$this->setLine($line);
		$this->setIgnorables($ignorables);
		$this->initalizeSubNodeNames();
	}

	/**
	 * @param mixed $nodes
	 * @param string $subNodeName
	 */
	protected function setSelfAsSubNodeParent($nodes, $subNodeName) {
		if ($nodes instanceof \PHPParser_Node) {
			/** @var $nodes \PHPParser_Node */
			$nodes->setParent($this, $subNodeName);
		} else if (is_array($nodes)) {
			foreach ($nodes as $node) {
				$this->setSelfAsSubNodeParent($node, $subNodeName);
			}
		}
	}

	/**
	 * Gets the type of the node.
	 *
	 * @return string Type of the node
	 */
	public function getNodeType() {
		return substr(get_class($this), 15);
	}

	/**
	 * Initializes the subnodes
	 */
	protected function initalizeSubNodeNames() {
		if (empty($this->subNodeNames)) {
			foreach (array_keys(get_class_vars(get_class($this))) as $propertyName) {
				if (!isset(static::$reservedProperties[$propertyName]) && method_exists($this, 'get' .ucfirst($propertyName))) {
						$this->subNodeNames[] = $propertyName;
				}
			}
		}
	}

	/**
	 * Gets the names of the sub nodes.
	 *
	 * @return array Names of sub nodes
	 */
	public function getSubNodeNames() {
		return $this->subNodeNames;
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
		$this->line = (int)$line;
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
	 * @param array $ignorables Ignorables
	 */
	public function setIgnorables(array $ignorables) {
		$this->ignorables = $ignorables;
	}

	/**
	 * @param PHPParser_Node_Ignorable $ignorable */
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
				if ($ignorable instanceof PHPParser_Node_Ignorable_Whitespace && strpos($ignorable->getValue(), PHP_EOL) !== false) {
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

	/**
	 * @param string $name
	 * @return mixed
	 */
	public function __get($name) {
		return $this->offsetGet($name);
	}

	/**
	 * @param string $name
	 * @param mixed $value
	 * @return void
	 */
	public function __set($name, $value) {
		$this->offsetSet($name, $value);
	}

	/**
	 * @param $name
	 * @return bool
	 */
	public function __isset($name) {
		return $this->offsetExists($name);
	}

	/**
	 * @param string $name
	 */
	public function __unset($name) {
		$unsetMethod = 'unset' . ucfirst($name);
		if (method_exists($this, $unsetMethod)) {
			$this->$unsetMethod();
		}
	}

	/**
	 * @return mixed
	 */
	public function current() {
		if (FALSE !== $currentSubNode = current($this->subNodeNames)) {
			return $this->{'get' . ucfirst($currentSubNode)}();
		}
		return $currentSubNode;
	}

	/**
	 * @return mixed
	 */
	public function next() {
		if (FALSE !== $nextSubNode = next($this->subNodeNames)) {
			return $this->{'get' . ucfirst($nextSubNode)}();
		}
		return $nextSubNode;
	}

	/**
	 * @return mixed
	 */
	public function key() {
		return current($this->subNodeNames);
	}

	/**
	 * @return bool
	 */
	public function valid() {
		return FALSE !== current($this->subNodeNames);
	}

	/**
	 * @return void
	 */
	public function rewind() {
		reset($this->subNodeNames);
	}

	/**
	 * @param string $offset
	 * @return bool
	 */
	public function offsetExists($offset) {
		return in_array($offset, $this->getSubNodeNames());
	}

	/**
	 * @param string $offset
	 * @return mixed
	 */
	public function offsetGet($offset) {
		return in_array($offset, $this->getSubNodeNames()) ? $this->{'get' . ucfirst($offset)}() : NULL;
	}

	/**
	 * @param string $offset
	 * @param mixed $value
	 * @return void
	 */
	public function offsetSet($offset, $value) {
		in_array($offset, $this->getSubNodeNames()) ? $this->{'set' . ucfirst($offset)}($value) : NULL;
	}

	/**
	 * @param string $offset
	 */
	public function offsetUnset($offset) {
		$unsetMethod = 'unset' . ucfirst($offset);
		if (method_exists($this, $unsetMethod)) {
			$this->$unsetMethod();
		}
	}

	/**
	 * @return int
	 */
	public function count() {
		return count($this->getSubNodeNames());
	}

	public function __wakeup() {
		$this->initalizeSubNodeNames();
	}

	/**
	 * @param \PHPParser_Node $parent
	 */
	final public function setParent(\PHPParser_Node $parent = NULL, $parentSubNodeName = NULL) {
		if (NULL !== $this->parent && ($parent !== $this->parent || (!empty($this->parentSubNodeName) && $parentSubNodeName !== $this->parentSubNodeName))) {
			// remove from existing parent
			$childNode = $this->parent->{'get' . ucfirst($this->parentSubNodeName)}();
			if (is_array($childNode)) {
				foreach ($childNode as $key=>$node) {
					if ($this === $node) {
						unset($childNode[$key]);
						break;
					}
				}
				$this->parent->{'set' . ucfirst($this->parentSubNodeName)}($childNode);
			} else if ($childNode === $this) {
				$this->parent->{'set' . ucfirst($this->parentSubNodeName)}();
			}
		}
		$this->parent = $parent;
		$this->parentSubNodeName = (string) $parentSubNodeName;
		return $this;
	}

	/**
	 * @return \PHPParser_Node
	 */
	final public function getParent() {
		return $this->parent;
	}

	/**
	 * @return string
	 */
	final public function getParentSubNodeName() {
		return $this->parentSubNodeName;
	}
}