<?php

/*
 * File: class_dto.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */

class class_dto {
    private $class_id;
    private $class_start_time;
    private $class_end_time;
    private $class_room;
    private $class_status;
    private $course_id;

    public function __construct($class_start_time, $class_end_time, $class_room, $class_status, $course_id) {
        $this->class_start_time = $class_start_time;
        $this->class_end_time =  $class_end_time;
        $this->class_room = $class_room;
        $this->class_status =  $class_status;
        $this->course_id = $course_id;
    }

    public function set_class_start($class_start_time) {
        $this->class_start_time = $class_start_time;
    }
    public function set_class_end($class_end_time) {
        $this->class_end_time = $class_end_time;
    }
    public function set_class_room($class_room) {
        $this->class_room = $class_room;
    }
    public function set_class_status($class_status) {
        $this->class_status = $class_status;
    }
    public function set_class_course_id($course_id) {
        $this->course_id = $course_id;
    }

    public function get_class_id() {
        return $this->class_id;
    }
    public function get_class_start_time() {
        return $this->class_start_time;
    }
    public function get_class_end_time() {
        return $this->class_end_time;
    }
    public function get_class_room() {
        return $this->class_room;
    }
    public function get_class_status() {
        return $this->class_status;
    }
    public function get_course_id() {
        return $this->course_id;
    }
}
?>
