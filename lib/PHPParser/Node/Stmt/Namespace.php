<?php

/**
 * @property null|PHPParser_Node_Name $name  Name
 * @property PHPParser_Node[]         $stmts Statements
 */
class PHPParser_Node_Stmt_Namespace extends PHPParser_Node_Stmt {

	/**
	 * Contains name
	 *
	 * @var PHPParser_Node_Name
	 */
	protected $name;

	/**
	 * Contains stmts
	 *
	 * @var PHPParser_Node
	 */
	protected $stmts;

	/**
	 * @var array
	 */
	protected static $specialNames = array(
		'self' => true,
		'parent' => true,
		'static' => true,
	);

	/**
	 * Constructs a namespace node.
	 *
	 * @param null|PHPParser_Node_Name $name Name
	 * @param null|PHPParser_Node[] $stmts Statements
	 * @param int $line Line
	 * @param PHPParser_Node_Ignorable[] $ignorables Ignorables
	 */
	public function __construct(PHPParser_Node_Name $name = null, $stmts = array(), $line = -1, $ignorables = array()) {
		parent::__construct($line, $ignorables);
		if (NULL !== $name) {
			$this->setName($name);
		}
		if (NULL !== $stmts) {
			$this->setStmts($stmts);
		}
	}

	/**
	 * @static
	 * @param array $stmts * @return array
	 * @throws PHPParser_Error
	 */
	public static function postprocess(array $stmts) {
		// null = not in namespace, false = semicolon style, true = bracket style
		$bracketed = null;

		// whether any statements that aren't allowed before a namespace declaration are encountered
		// (the only valid statement currently is a declare)
		$hasNotAllowedStmts = false;

		// offsets for semicolon style namespaces
		// (required for transplanting the following statements into their ->stmts property)
		$nsOffsets = array();

		foreach ($stmts as $i => $stmt) {
			if ($stmt instanceof PHPParser_Node_Stmt_Namespace) {
				// ->stmts is null if semicolon style is used
				$currentBracketed = NULL !== $stmt->getStmts();

				// if no namespace statement has been encountered yet
				if (!isset($bracketed)) {
					// set the namespacing style
					$bracketed = $currentBracketed;

					// and ensure that it isn't preceded by a not allowed statement
					if ($hasNotAllowedStmts) {
						throw new PHPParser_Error('Namespace declaration statement has to be the very first statement in the script', $stmt->getLine());
					}
					// otherwise ensure that the style of the current namespace matches the style of
					// namespaceing used before in this document
				} elseif ($bracketed !== $currentBracketed) {
					throw new PHPParser_Error('Cannot mix bracketed namespace declarations with unbracketed namespace declarations', $stmt->getLine());
				}

				// for semicolon style namespaces remember the offset
				if (!$bracketed) {
					$nsOffsets[] = $i;
				}
				// declare() and __halt_compiler() are the only valid statements outside of namespace declarations
			} elseif (!$stmt instanceof PHPParser_Node_Stmt_Declare
					&& !$stmt instanceof PHPParser_Node_Stmt_HaltCompiler
			) {
				if (true === $bracketed) {
					throw new PHPParser_Error('No code may exist outside of namespace {}', $stmt->getLine());
				}

				$hasNotAllowedStmts = true;
			}
		}

		// if bracketed namespaces were used or no namespaces were used at all just return the
		// original statements
		if (!isset($bracketed) || true === $bracketed) {
			return $stmts;
			// for semicolon style transplant statements
		} else {
			// take all statements preceding the first namespace
			$newStmts = array_slice($stmts, 0, $nsOffsets[0]);

			// iterate over all following namespaces
			for ($i = 0, $c = count($nsOffsets); $i < $c; ++$i) {
				$newStmts[] = $nsStmt = $stmts[$nsOffsets[$i]];

				// the last namespace takes all statements after it
				if ($c === $i + 1) {
					$nsStmt->setStmts(array_slice($stmts, $nsOffsets[$i] + 1));

					// if the last statement is __halt_compiler() put it outside the namespace
					if (end($nsStmt->stmts) instanceof PHPParser_Node_Stmt_HaltCompiler) {
						$newStmts[] = array_pop($nsStmt->stmts);
					}
					// and all the others take all statements between the current and the following one
				} else {
					$nsStmt->setStmts(array_slice($stmts, $nsOffsets[$i] + 1, $nsOffsets[$i + 1] - $nsOffsets[$i] - 1));
				}
			}

			return $newStmts;
		}
	}

	/**
	 * @param PHPParser_Node_Name $name */
	public function setName(PHPParser_Node_Name $name) {
		if (isset(self::$specialNames[(string)$name])) {
			throw new PHPParser_Error(sprintf('Cannot use "%s" as namespace name as it is reserved', $name));
		}
		$this->name = $name;
	}

	/**
	 * @return PHPParser_Node_Name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param PHPParser_Node[] $stmts */
	public function setStmts(array $stmts) {
		foreach ($stmts as $stmt) {
			if ($stmt instanceof PHPParser_Node_Stmt_Namespace) {
				throw new PHPParser_Error('Namespace declarations cannot be nested', $stmt->getLine());
			}
		}
		$this->stmts = $stmts;
	}

	/**
	 * @return PHPParser_Node[]
	 */
	public function getStmts() {
		return $this->stmts;
	}
}