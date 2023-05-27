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

    public function showTaskAction(){

        $todo = new ToDoModel();

        $tasks = $todo->getTasks();

        if (!isset($_GET['id'])) {
            echo "Not found.";
            exit;
        }

        $taskId = $_GET['id'];

        $task = getTaskById($taskId);

        if(!$task) {
            echo "Task not found.";
          exit;
        }  
        
    }

	public function createTaskAction(){
        $this->view->message = "TO-DO App - CREATE TASK VIEW!!!!";
    }

	public function deleteTaskAction(){
        $this->view->message = "TO-DO App - DELETE TASK VIEW!!!!";
    }

	public function searchTaskAction(){
        $this->view->message = "ONE SINGLE TASK";
    }

	public function showAllTasksAction(){

        $todo = new ToDoModel();
        $tasks = $todo->getTasks();
        //require ROOT_PATH.'/app/views/scripts/todo/showAllTasks.phtml';
        //$this->view->message = "TO-DO App - SHOW ALL TASKS VIEW!!!!";
        //$this->view->message = var_dump($tasks);
        //$this->view->content = print_r($tasks);
    }

	public function updateTaskAction(){
        $this->view->message = "TO-DO App - UPDATE TASK VIEW!!!!";
    }


}