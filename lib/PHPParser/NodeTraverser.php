<?php

class PHPParser_NodeTraverser {

	/**
	 * @var PHPParser_NodeVisitor[] Visitors
	 */
	protected $visitors = array();

	/**
	 * @param PHPParser_NodeVisitor[] $visitors
	 */
	public function setVisitors(array $visitors = NULL) {
		$this->visitors = $visitors;
		return $this;
	}

	/**
	 * @return PHPParser_NodeVisitor[]
	 */
	public function getVisitors() {
		return $this->visitors;
	}

	/**
	 * @param PHPParser_NodeVisitor $visitor
	 */
	public function appendVisitor(PHPParser_NodeVisitor $visitor) {
		if (!is_array($this->visitors)) {
			$this->visitors = array();
		}
		$this->visitors[] = $visitor;
		return $this;
	}

	/**
	 * @param PHPParser_NodeVisitor $visitor
	 */
	public function removeVisitor(PHPParser_NodeVisitor $visitor) {
		if (!is_array($this->visitors)) {
			foreach ($this->visitors as $key => $existingVisitor) {
				if ($visitor === $existingVisitor) {
					unset($this->visitors[$key]);
					break;
				}
			}
		}
		return $this;
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
			if (NULL !== $return = $visitor->beforeTraverse($nodes)) {
				$nodes = $return;
			}
		}

		$nodes = $this->traverseArray($nodes);

		foreach ($this->visitors as $visitor) {
			if (NULL !== $return = $visitor->afterTraverse($nodes)) {
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
					if (NULL !== $return = $visitor->enterNode($node->$getterMethod())) {
						$node->$setterMethod($return);
					}
				}
				$node->$setterMethod($this->traverseNode($node->$getterMethod()));
				foreach ($this->visitors as $visitor) {
					if (NULL !== $return = $visitor->leaveNode($node->$getterMethod())) {
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
					if (NULL !== $return = $visitor->enterNode($node)) {
						$node = $return;
					}
				}

				$node = $this->traverseNode($node);

				foreach ($this->visitors as $visitor) {
					$return = $visitor->leaveNode($node);

					if (FALSE === $return) {
						$doNodes[] = array($i, array());
						break;
					} elseif (is_array($return)) {
						$doNodes[] = array($i, $return);
						break;
					} elseif (NULL !== $return) {
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