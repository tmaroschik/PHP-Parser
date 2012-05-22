<?php

class PHPParser_NodeTraverser {

	/**
	 * @var PHPParser_NodeVisitor[] Visitors
	 */
	protected $visitors = array();

	/**
	 * Adds a visitor.
	 *
	 * @param PHPParser_NodeVisitor $visitor Visitor to add
	 */
	public function addVisitor(PHPParser_NodeVisitor $visitor) {
		$this->visitors[] = $visitor;
	}

	/**
	 * Traverses an array of nodes using the registered visitors.
	 *
	 * @param PHPParser_Node[] $nodes Array of nodes
	 *
	 * @return PHPParser_Node[] Traversed array of nodes
	 */
	public function traverse(array $nodes) {
		foreach ($this->visitors as $visitor) {
			if (null !== $return = $visitor->beforeTraverse($nodes)) {
				$nodes = $return;
			}
		}

		$nodes = $this->traverseArray($nodes);

		foreach ($this->visitors as $visitor) {
			if (null !== $return = $visitor->afterTraverse($nodes)) {
				$nodes = $return;
			}
		}

		return $nodes;
	}

	protected function traverseNode(PHPParser_Node $node) {
		foreach ($node->getSubNodeNames() as $name) {
			$getterMethod = 'get' . ucfirst($name);
			$setterMethod = 'set' . ucfirst($name);
			if (is_array($node->$getterMethod())) {
				$node->$setterMethod($this->traverseArray($node->$getterMethod()));
			} elseif ($node->$getterMethod() instanceof PHPParser_Node) {
				foreach ($this->visitors as $visitor) {
					if (null !== $return = $visitor->enterNode($node->$getterMethod())) {
						$node->$setterMethod($return);
					}
				}
				$node->$setterMethod($this->traverseNode($node->$getterMethod()));
				foreach ($this->visitors as $visitor) {
					if (null !== $return = $visitor->leaveNode($node->$getterMethod())) {
						$node->$setterMethod($return);
					}
				}
			}
		}

		return $node;
	}

	protected function traverseArray(array $nodes) {
		$doNodes = array();

		foreach ($nodes as $i => &$node) {
			if (is_array($node)) {
				$node = $this->traverseArray($node);
			} elseif ($node instanceof PHPParser_Node) {
				foreach ($this->visitors as $visitor) {
					if (null !== $return = $visitor->enterNode($node)) {
						$node = $return;
					}
				}

				$node = $this->traverseNode($node);

				foreach ($this->visitors as $visitor) {
					$return = $visitor->leaveNode($node);

					if (false === $return) {
						$doNodes[] = array($i, array());
						break;
					} elseif (is_array($return)) {
						$doNodes[] = array($i, $return);
						break;
					} elseif (null !== $return) {
						$node = $return;
					}
				}
			}
		}

		if (!empty($doNodes)) {
			while (list($i, $replace) = array_pop($doNodes)) {
				array_splice($nodes, $i, 1, $replace);
			}
		}

		return $nodes;
	}
}