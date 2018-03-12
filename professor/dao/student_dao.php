<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/student.php";

class student_dao
{
    public function insert_student(Student $student)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into student(student_number, program_id) values (?,?)');
        $stmt->bind_param("ii", $student->get_student_num(),$student->get_program_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function update_student(Student $student)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update student set student_number = ?, program_id = ? where student_id = ?');
        $stmt->bind_param("iii", $student->get_student_num(), $student->get_program_id(),$student->get_student_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }
}
