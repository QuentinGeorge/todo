<?php
include 'models/taskModel.php';

function index() {
    $_SESSION['tasks'] = getTasksDB($_SESSION['user']['id']);

    return ['view' => 'views/taskindex.php'];
};

function create() {
    $description = $_POST['description'];
    $taskID = createTaskDB($description);
    linkTaskID($taskID, $_SESSION['user']['id']);

    header('Location: http://homestead.app/PHP/todo/index.php');
    exit;
};

function getUpdate() {
    foreach ($_SESSION['tasks'] as $key => $value) {
        if ($value['taskId'] == $_GET['id']) {
            $_SESSION['tasks'][$key]['editable'] = 1;
        } else {
            $_SESSION['tasks'][$key]['editable'] = 0;
        }
    }

    return ['view' => 'views/taskindex.php'];
};

function postUpdate() {
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
    updateTaskDB($_POST['id'], $description, $taskNewStatus);

    header('Location: http://homestead.app/PHP/todo/index.php');
    exit;
};

function postDelete() {
    deleteTaskDB($_POST['id']);

    header('Location: http://homestead.app/PHP/todo/index.php');
    exit;
};
