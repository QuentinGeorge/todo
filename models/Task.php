<?php
namespace Models;

use Models\Model as Model;

class Task extends Model {
    public function getTasksDB($userID) {
        $pdo = $this->connectDB();
        if ($pdo) {
            $sql = 'SELECT tasks.id AS taskId, tasks.description AS taskDescription, tasks.is_done AS taskIsDone
            FROM tasks
            LEFT JOIN task_user ON tasks.id = task_user.task_id
            LEFT JOIN users ON task_user.user_id = users.id
            WHERE users.id = :userId
            ORDER BY description ASC';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt->execute([
                    ':userId' => $userID
                ]);
                return $pdoSt->fetchAll();
            } catch (\PDOException $e) {
                die('Une erreure est survenue lors de la connection');
            }
        } else {
            die('Une erreure est survenue lors de la connection a la DB');
        }
    }

    public function createTaskDB($description) {
        $pdo = $this->connectDB();
        if ($pdo) {
            $sql = 'INSERT INTO tasks(`description`) VALUES(:description)';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt->execute([
                    ':description' => $description
                ]);
                return $pdo->lastInsertId();
            } catch (\PDOException $e) {
                die('Une erreure est survenue lors de la connection');
            }
        } else {
            die('Une erreure est survenue lors de la connection a la DB');
        }
    }

    public function linkTaskID($taskID, $userID) {
        $pdo = $this->connectDB();
        if ($pdo) {
            $sql = 'INSERT INTO task_user(`task_id`, `user_id`) VALUES(:task_id, :user_id)';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt->execute([
                    ':task_id' => $taskID,
                    ':user_id' => $userID
                ]);
            } catch (\PDOException $e) {
                die('Une erreure est survenue lors de la connection');
            }
        } else {
            die('Une erreure est survenue lors de la connection a la DB');
        }
    }

    public function updateTaskDB($taskID, $description, $taskNewStatus) {
        $pdo = $this->connectDB();
        if ($pdo) {
            $sql = 'UPDATE tasks
            SET description = :description, is_done = :status
            WHERE id = :id';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt->execute([
                    ':id' => $taskID,
                    ':description' => $description,
                    ':status' => $taskNewStatus
                ]);
            } catch (\PDOException $e) {
                die('Une erreure est survenue lors de la connection');
            }
        } else {
            die('Une erreure est survenue lors de la connection a la DB');
        }
    }

    public function deleteTaskDB($taskID) {
        $pdo = $this->connectDB();
        if ($pdo) {
            $sql = 'DELETE FROM tasks WHERE id = :id';
            try {
                $pdoSt = $pdo->prepare($sql);
                $pdoSt->execute([
                    ':id' => $taskID
                ]);
            } catch (\PDOException $e) {
                die('Une erreure est survenue lors de la connection');
            }
        } else {
            die('Une erreure est survenue lors de la connection a la DB');
        }
    }
}
