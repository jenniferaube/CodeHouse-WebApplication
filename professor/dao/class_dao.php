<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/class.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/course.php";

class class_dao {
    public function insert_class($class) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into class(class_start_time, class_end_time, class_room, class_status, course_id) values (?, ?, ?, ?, ?)');
        $stmt->bind_param("iisii", $class->get_class_start_time(), $class->get_class_end_time(), $class->get_class_room(), $class->get_class_status(), $class->get_course_id());
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function update_class($class) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update class set class_start_time = ?, class_end_time = ?, class_room = ?, class_status = ?, course_id = ? where class_id = ?');
        $stmt->bind_param("iisiii", $class->get_class_start_time(), $class->get_class_end_time(), $class->get_class_room(), $class->get_class_status(), $class->get_course_id(), $class->get_class_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function select_all($professor_id) {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('select * from class inner join course on class.course_id = course_id where prof_id = ?');
        $stmt->bind_param("i", $professor_id);
        $stmt->execute();
        $results = $stmt->fetchAll();
        $stmt->close();
        Connection::closeConnection($conn);
        return $results;
    }
}