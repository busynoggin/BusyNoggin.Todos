<?php

/**
 * Todo controller for the busynoggin_todos extension
 */
class Tx_BusynogginTodos_Controller_TodoController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * todoRepository
	 *
	 * @var Tx_BusynogginTodos_Domain_Repository_TodoRepository
	 * @inject
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
	 * @param tx_busynoggintodos_domain_model_todo$newTodo
	 * @dontvalidate $newTodo
	 * @return void
	 */
	public function newAction(Tx_BusynogginTodos_Domain_Model_Todo $newTodo = NULL) {
		if ($newTodo == NULL) {
			$newTodo = t3lib_div::makeInstance('Tx_BusynogginTodos_Domain_Model_Todo');
		}
		$this->view->assign('newTodo', $newTodo);
	}

	/**
	 * action create
	 *
	 * @param tx_busynoggintodos_domain_model_todo $newTodo
	 * @return void
	 */
	public function createAction(Tx_BusynogginTodos_Domain_Model_Todo $newTodo) {
		$this->todoRepository->add($newTodo);
		$this->flashMessageContainer->add('Your new Todo was created.');
		$this->redirect('index');
	}

	/**
	 * action edit
	 *
	 * @param tx_busynoggintodos_domain_model_todo $todo
	 * @return void
	 */
	public function editAction(Tx_BusynogginTodos_Domain_Model_Todo $todo) {
		$this->view->assign('todo', $todo);
	}

	/**
	 * action update
	 *
	 * @param tx_busynoggintodos_domain_model_todo $todo
	 * @return void
	 */
	public function updateAction(Tx_BusynogginTodos_Domain_Model_Todo $todo) {
		$this->todoRepository->update($todo);
		$this->flashMessageContainer->add('Your Todo was updated.');
		$this->redirect('index');
	}

	/**
	 * action delete
	 *
	 * @param tx_busynoggintodos_domain_model_todo $todo
	 * @return void
	 */
	public function deleteAction(Tx_BusynogginTodos_Domain_Model_Todo $todo) {
		$this->todoRepository->remove($todo);
		$this->flashMessageContainer->add('Your Todo was removed.');
		$this->redirect('index');
	}

}
?>