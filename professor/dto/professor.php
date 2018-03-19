<?php
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
