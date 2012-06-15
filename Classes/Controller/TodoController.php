<?php
namespace BusyNoggin\Todos\Controller;

use TYPO3\FLOW3\Annotations as FLOW3;

/**
 * Todo controller for the BusyNoggin.Todos package
 *
 * @FLOW3\Scope("singleton")
 */
class TodoController extends \TYPO3\FLOW3\Mvc\Controller\ActionController {

	/**
	 * @FLOW3\Inject
	 * @var \BusyNoggin\Todos\Domain\Repository\TodoRepository
	 */
	protected $todoRepository;

	/**
	 * action list
	 *
	 * @return void
	 */
	public function indexAction() {
		$todos = $this->todoRepository->findAll();
		$this->view->assign('todos', $todos);
	}

	/**
	 * action new
	 *
	 * @param \BusyNoggin\Todos\Domain\Model\Todo $newTodo
	 * @FLOW3\IgnoreValidation("$newTodo")
	 * @return void
	 */
	public function newAction(\BusyNoggin\Todos\Domain\Model\Todo $newTodo = NULL) {
		if ($newTodo == NULL) {
			$newTodo = new \BusyNoggin\Todos\Domain\Model\Todo();
		}
		$this->view->assign('newTodo', $newTodo);
	}

	/**
	 * action create
	 *
	 * @param \BusyNoggin\Todos\Domain\Model\Todo $newTodo
	 * @return void
	 */
	public function createAction(\BusyNoggin\Todos\Domain\Model\Todo $newTodo) {
		$this->todoRepository->add($newTodo);
		$this->flashMessageContainer->addMessage(new \TYPO3\FLOW3\Error\Message('Your new Todo was created.'));
		$this->redirect('index');
	}

	/**
	 * action edit
	 *
	 * @param \BusyNoggin\Todos\Domain\Model\Todo $todo
	 * @return void
	 */
	public function editAction(\BusyNoggin\Todos\Domain\Model\Todo $todo) {
		$this->view->assign('todo', $todo);
	}

	/**
	 * action update
	 *
	 * @param \BusyNoggin\Todos\Domain\Model\Todo $todo
	 * @return void
	 */
	public function updateAction(\BusyNoggin\Todos\Domain\Model\Todo $todo) {
		$this->todoRepository->update($todo);
		$this->flashMessageContainer->addMessage(new \TYPO3\FLOW3\Error\Message('Your Todo was updated.'));
		$this->redirect('index');
	}

	/**
	 * action delete
	 *
	 * @param \BusyNoggin\Todos\Domain\Model\Todo $todo
	 * @return void
	 */
	public function deleteAction(\BusyNoggin\Todos\Domain\Model\Todo $todo) {
		$this->todoRepository->remove($todo);
		$this->flashMessageContainer->addMessage(new \TYPO3\FLOW3\Error\Message('Your Todo was removed.'));
		$this->redirect('index');
	}

}

?>