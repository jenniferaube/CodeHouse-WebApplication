<?php
/*
 * File: professor.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
class professor {
    private $prof_id;
    private $prof_num;

    public function __construct($prof_num) {
        $this->prof_num = $prof_num;
    }

    public function set_prof_num($prof_num) {
        $this->prof_num = $prof_num;
    }

    public function get_prof_num() {
        return $this->prof_num;
    }

    public function get_prof_id() {
        return $this->prof_id;
    }
}
