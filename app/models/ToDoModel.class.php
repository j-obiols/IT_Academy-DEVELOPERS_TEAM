<?php

// define enum type
enum taskState{
    case Pending;
    case Ongoing;
    case Finished;
}

// define Task class
class Task{
    
    private static $id_counter = 1; // we create a static task counter that will be used to set the 'id' of every new task
    public int $id;
    public string $name;
    public string $start_time;
    public string $end_time;
    public taskState $status;
    public string $author;

    public function __construct(string $name, string $author){
        // constructor sets the task id
        $this->id = Task::$id_counter;
        Task::$id_counter ++;
        $this->name = $name;
        // constructor sets the start date
        $this->start_time = date("Y-m-d, G:i:s", time());
        $this->end_time = "";
        // constructor sets the status
        $this->status = taskState::Pending;
        $this->author = $author;
    }
}


// helper function that returns all tasks from json file
function readTasks_json(): array{

    (string) $jsonFile = file_get_contents('./data/data.json');
    (array) $tasks = json_decode($jsonFile);  // returns array of task objects

    return $tasks;
}

// helper function to save all tasks into a json file
function saveTasks_json(array $tasks): bool {

    // save all tasks to json
    (string) $path = './data/data.json';
    // Convert JSON data from an array to a string
    (string) $jsonString = json_encode($tasks, JSON_PRETTY_PRINT);
    // Write in the file
    $fp = fopen($path, 'w');
    fwrite($fp, $jsonString);
    
    return fclose($fp);
}



// define ToDoModel class
class ToDoModel extends Model{


    // method that returns an array containing all tasks
    public function getTasks(): array{
        (array) $tasks = readTasks_json();
        return $tasks;
    }

    public function createTask(string $name, string $author){

        // get all tasks
        $tasks = $this->getTasks();
        // instantiate a new Task object
        $task = new Task($name, $author);
        // add the new task object to all tasks
        $tasks[] = $task;

        $saved = saveTasks_json($tasks);
        if (! $saved){
            echo "Error saving json file!!";
        };

    }

}