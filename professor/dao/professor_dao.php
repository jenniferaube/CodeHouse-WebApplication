<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/professor.php";

class professor_dao
{
    public function insert_prof(Professor $professor)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into professor(prof_number) values (?)');
        $stmt->bind_param("i", $professor->get_prof_num());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function update_prof(Professor $professor)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update professor set prof_number = ? where prof_id = ?');
        $stmt->bind_param("ii", $professor->get_prof_num(), $professor->get_prof_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }
}
