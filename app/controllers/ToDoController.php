<?php

/**
 * Base controller for the application.
 * Add general things in this controller.
 */
class ToDoController extends Controller 
{
	
    // home method that will show main menu
    public function indexAction(){
        $this->view->message = "TO-DO App - HOME VIEW!!!!";
    }

	public function createTaskAction(){
        $this->view->message = "TO-DO App - CREATE TASK VIEW!!!!";
    }

	public function deleteTaskAction(){
        $this->view->message = "TO-DO App - DELETE TASK VIEW!!!!";
    }

	public function searchTaskAction(){
        $this->view->message = "TO-DO App - SEARCH TASK VIEW!!!!";
    }

	public function showAllTasksAction(){
        $todo = new ToDoModel();
        $tasks = $todo->getTasks();
        $this->view->message = "TO-DO App - SHOW ALL TASKS VIEW!!!!";
        //$this->view->message = var_dump($tasks);
        $this->view->content = print_r($tasks);
    }

	public function updateTaskAction(){
        $this->view->message = "TO-DO App - UPDATE TASK VIEW!!!!";
    }


}