<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TaskGateway
 *
 * @author basousa
 */
class TaskGateway {
   private $con;
    
    public function __construct(Connection $con) {
        $this->con=$con;
    }
    
    public function insert(Task $task, Liste $id) {
        $query="INSERT INTO task(content,isMade) VALUES (?,?)";
        $this->con->executeQuery($query, array(
            1 => array($task->getContent(), PDO::PARAM_STR),
            2 => array($task->getIsMade(), PDO::PARAM_BOOL),
            ));  
        $lastInsertId = $this->con->lastInsertId();
        $query2="INSERT INTO list_task VALUES (?, ?)";
        $this->con->executeQuery($query2, array(
            1 => array($id->getId(), PDO::PARAM_INT),
            2 => array($lastInsertId, PDO::PARAM_INT)
            ));
    }
    
    public function update(Task $task) {
        $query="UPDATE task SET content=?, isMade=? WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($task->getContent(), PDO::PARAM_STR),
            2 => array($task->getIsMade(), PDO::PARAM_BOOL),
            3 => array($task->getId(), PDO::PARAM_INT)
            ));
    }
    
    public function remove(int $idTask, Liste $list) {
        $query="DELETE FROM task WHERE id=?";
        $this->con->executeQuery($query, array(
            1 => array($idTask, PDO::PARAM_INT)
            ));
        $query2="DELETE FROM list_task WHERE id_list=? AND id_task=?";
        $this->con->executeQuery($query2, array(
            1 => array($list->getId(), PDO::PARAM_INT),
            2 => array($idTask, PDO::PARAM_INT)
            ));
    }
    public function getTasks(int $idList):?array {
         $query="SELECT id,content,ismade FROM task,list_task WHERE list_task.id_list=? AND list_task.id_task = task.id";
         $this->con->executeQuery($query, array(
            1 => array($idList, PDO::PARAM_INT)
         ));
        $result =  $this->con->getResults();

        if(!isset($result) || sizeof($result) == 0){
            return null;
        }

        foreach($result as $task){
            $tabTask[] = new Task($task['id'],$task['content'],$task['ismade']);
        }
        return $tabTask;
    }
    
    public function getTask(int $idList, int $idTask):?Task {
         $query="SELECT id,content,ismade FROM task,list_task WHERE list_task.id_list=? AND list_task.id_task = ? AND task.id = ?";
         $this->con->executeQuery($query, array(
            1 => array($idList, PDO::PARAM_INT),
            2 => array($idTask, PDO::PARAM_INT),
            3 => array($idTask, PDO::PARAM_INT) 
         ));
        $result =  $this->con->getResults();

        if(!isset($result)){
            return null;
        }
        foreach($result as $task){
            $myTask = new Task($task['id'], $task['content'], $task['ismade']);
        }
        return $myTask;
    }

}
