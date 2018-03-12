<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/course.php";

class course_dao {
    public function insert_course(Course $course)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('insert into course(course_number, course_title, course_section, program_id, prof_id) values (?,?,?,?,?)');
        $stmt->bind_param("isiii", $course->get_course_num(),$course->get_course_title(), $course->get_course_section(), $course->get_program_id(), $course->get_prof_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }

    public function update_course(Course $course)
    {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare('update course set course_number = ?, course_title = ?, course_section = ?, program_id = ?, prof_id = ? where course_id = ?');
        $stmt->bind_param("isiiii", $course->get_course_num(),$course->get_course_title(), $course->get_course_section(), $course->get_program_id(), $course->get_prof_id(), $course->get_course_id());
        $stmt->execute();
        $stmt->close();
        Connection::closeConnection($conn);
    }
}