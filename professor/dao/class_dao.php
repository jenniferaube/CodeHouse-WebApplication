<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/class_dto.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/course.php";

class class_dao
{
    public function insert_class($class)
    {
        $class_start_time = $class->get_class_start_time();
        $class_end_time = $class->get_class_end_time();
        $class_room = $class->get_class_room();
        $class_status = $class->get_class_status();
        $course_id = $class->get_course_id();
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into class(class_start_time, class_end_time, class_room, class_status, course_id) values (?, ?, ?, ?, ?)');
        $stmt->bind_param("ssssi",$class_start_time, $class_end_time, $class_room, $class_status, $course_id);
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function update_class($class)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update class set class_start_time = ?, class_end_time = ?, class_room = ?, class_status = ?, course_id = ? where class_id = ?');
        $stmt->bind_param("iisiii", $class->get_class_start_time(), $class->get_class_end_time(), $class->get_class_room(), $class->get_class_status(), $class->get_course_id(), $class->get_class_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function select_all($professor_id)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('select class.class_id, DATE_FORMAT(class.class_start_time, \'%Y-%m-%dT%H:%i:%s\'), DATE_FORMAT(class.class_end_time, \'%Y-%m-%dT%H:%i:%s\'), 
                                               class.class_room, class.class_status, course.course_abbr, course.course_number, course.course_section, class.course_id
                                       from class inner join course on class.course_id = course.course_id 
                                       where prof_id = ?');
        $stmt->bind_param("i", $professor_id);
        $stmt->execute();
        $resultSet = $stmt->get_result();
        $results = $resultSet->fetch_all();
        $stmt->close();
        Connection::closeConnection($conn);
        return $results;
    }

    public function select_by_time($start, $end)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('select class_id from class where class_start_time = ? and class_end_time = ?');
        $stmt->bind_param("ss", $start, $end);
        $stmt->execute();
        $resultSet = $stmt->get_result();
        $results = $resultSet->fetch_all();
        $stmt->close();
        Connection::closeConnection($conn);
        return $results;
    }

    public function update_class_by_id($id, $status)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update class set class_status = ? where class_id = ?');
        $stmt->bind_param("si", $status, $id);
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function select_cancelled($status)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('select class.class_start_time, class.class_end_time, class.class_room,
                                       course.course_abbr, course.course_number, course.course_title, course.course_section
                                       from class inner join course on class.course_id = course.course_id
                                       where addtime(now(), \'0:15:00\') < class_start_time and class_status = ? and date(class_start_time) = CURDATE() and class.course_id != 99999');
        $stmt->bind_param("s", $status);
        $stmt->execute();
        $resultSet = $stmt->get_result();
        $results = $resultSet->fetch_all();
        $stmt->close();
        Connection::closeConnection($conn);
        return $results;
    }

    public function delete_class()
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('truncate class');
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }
}
