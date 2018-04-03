<?php
/*
 * File: student.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
class student
{
    private $student_id;
    private $student_num;
    private $program_id;

    public function __construct($student_num, $program_id)
    {
        $this->student_num = $student_num;
        $this->program_id = $program_id;
    }

    public function set_student_num($student_num)
    {
        $this->student_num = $student_num;
    }

    public function set_program_id($program_id)
    {
        $this->program_id = $program_id;
    }

    public function get_student_id()
    {
        return $this->student_id;
    }

    public function get_student_num()
    {
        return $this->student_num;
    }

    public function get_program_id()
    {
        return $this->program_id;
    }
}
