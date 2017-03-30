<?php
namespace Controllers;

use Models\Task as ModelsTask;

class Task {
    public function index() {
        $modelsTask = new ModelsTask();

        $_SESSION['tasks'] = $modelsTask->getTasksDB($_SESSION['user']['id']);

        return ['view' => 'views/taskindex.php'];
    }

    public function create() {
        $modelsTask = new ModelsTask();

        $description = $_POST['description'];
        $taskID = $modelsTask->createTaskDB($description);
        $modelsTask->linkTaskID($taskID, $_SESSION['user']['id']);

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }

    public function getUpdate() {
        foreach ($_SESSION['tasks'] as $key => $value) {
            if ($value['taskId'] == $_GET['id']) {
                $_SESSION['tasks'][$key]['editable'] = 1;
            } else {
                $_SESSION['tasks'][$key]['editable'] = 0;
            }
        }

        return ['view' => 'views/taskindex.php'];
    }

    public function postUpdate() {
        $modelsTask = new ModelsTask();

        if (!empty($_POST['description'])) {
            $description = $_POST['description'];
        } else {
            foreach ($_SESSION['tasks'] as $key => $value) {
                if ($value['taskId'] == $_POST['id']) {
                    $description = $_SESSION['tasks'][$key]['taskDescription'];
                }
            }
        }
        if ($_POST['is_done'] == 1) {
            $taskNewStatus = '1';
        } else {
            $taskNewStatus = '0';
        }
        $modelsTask->updateTaskDB($_POST['id'], $description, $taskNewStatus);

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }

    public function postDelete() {
        $modelsTask = new ModelsTask();

        $modelsTask->deleteTaskDB($_POST['id']);

        header('Location:' . PROJECT_PATH . 'index.php');
        exit;
    }
}
