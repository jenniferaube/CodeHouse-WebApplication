<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 3/19/2018
 * Time: 1:17 PM
 */

include_once $_SERVER['DOCUMENT_ROOT'] . "/assets/class/sql/connection.php";

class appointment_DAO{

    public function get_professors($student){

        $conn = Connection::getConnection();

        $stmt = $conn->prepare('SELECT DISTINCT concat(prof.first_name," ", prof.last_name) as "Name", prof.email 
                                      FROM ( SELECT c.course_id, u.first_name, u.last_name, u.email
                                          FROM user u
                                          INNER JOIN professor p ON u.id = p.prof_id
                                          INNER JOIN course c ON c.prof_id = p.prof_id) prof
                                      INNER JOIN 
                                        ( SELECT c.course_id
                                          FROM user u
                                          INNER JOIN student s ON s.student_id = u.id
                                          INNER JOIN program p ON p.program_id = s.program_id
                                          INNER JOIN course c ON c.program_id = p.program_id
                                          WHERE u.email LIKE ?) stu 
                                      ON prof.course_id = stu.course_id;');
        $stmt->bind_param("s", $student);

        $stmt->execute();
        $resultSet = $stmt->get_result();
        $results = $resultSet->fetch_all();

        $stmt->close();
        $conn->close();

        return $results;
    }

}
