<?php

class TodolistController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
        $this->view->todolists = Todolist::find();
    }

    public function showAction($id){
        $todolist = Todolist::findFirst($id);
		if(!$todolist){
			$this->flash->error("Don’t try be smart and edit an invalid task.");
			$this->dispatcher->forward(['action' => 'index']);
		}
		else {
			$this->tag->displayTo("id", $todolist->id);
			$this->tag->displayTo("title", $todolist->title);
			$this->tag->displayTo("note", $todolist->note);
		}

    }

    // for updating
	public function updateAction()
	{
		if(!$this->request->isPost()){

			$this->flash->error("Invalid Request!!!");
		}
		
		else {

			$id = $this->request->getPost("id");
			$todolist = Todolist::findFirst($id);
            
			if(!$todolist){
				$this->flash->error("No such record found");
			}
			else {
				$success = $todolist->save($this->request->getPost(), array('title', 'note'));

				if (!$success) {
					$this->flash->error("Following Errors occurred: <br/>");

					foreach ($todolist->getMessages() as $message) {
						$this->flash->error($message);
					}

					return $this->dispatcher->forward(array(
				        "action" => "edit",
				        "params" => array($todolist->id)
				    ));
				}

				$this->flash->success("Task Successfully Updated!");
			}
		}

		$this->dispatcher->forward(['action' => 'index']);						
	}	


    public function newAction()
    {

	}
	
	public function createAction(){
		$todolist = new Todolist();
		$success = $todolist->save($this->request->getPost(), array('title', 'note'));

		if ($success) {
			$this->flash->success("Contact Successfully Saved!");
			$this->dispatcher->forward(['action' => 'index']);
		}
		else {
			$this->flash->error("Following Errors occurred: <br/>");

			foreach ($contact->getMessages() as $message) {
				$this->flash->error($message);
			}

			$this->dispatcher->forward(['action' => 'new']);
		}
	}

	// for removing a contact
	public function deleteAction($id)
	{
		$todolist = Todolist::findFirst($id);

		if(!$todolist){
			$this->flash->error("Don’t try to remove a contact that doesn’t even exist in the first please.");
		}
		else {
			if(!$todolist->delete()){
				
				foreach ($todolist->getMessages() as $message) {
					$this->flash->error($message);
				}
			}
			else{
				$this->flash->success("The Task R.I.P successful!!!");
			}

		}

		$this->dispatcher->forward(['action' => 'index']);
	}

}

