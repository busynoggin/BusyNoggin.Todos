<?php

/**
 * A Todo
 *
 */
class Tx_BusynogginTodos_Domain_Model_Todo extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * Item description
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $description;

	/**
	 * Item is done
	 *
	 * @var boolean
	 */
	protected $done = FALSE;

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the done
	 *
	 * @return boolean $done
	 */
	public function getDone() {
		return $this->done;
	}

	/**
	 * Sets the done
	 *
	 * @param boolean $done
	 * @return void
	 */
	public function setDone($done) {
		$this->done = $done;
	}

	/**
	 * Returns the boolean state of done
	 *
	 * @return boolean
	 */
	public function isDone() {
		return $this->getDone();
	}
}
?>