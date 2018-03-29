<<<<<<< HEAD
<?php
class course {
    private $course_id;
    private $course_abbr;
    private $course_num;
    private $course_title;
    private $course_section;
    private $program_id;
    private $prof_id;

    public function __construct($course_abbr, $course_num, $course_title, $course_section, $program_id, $prof_id) {
        $this->course_abbr = $course_abbr;
        $this->course_num = $course_num;
        $this->course_title =  $course_title;
        $this->course_section = $course_section;
        $this->program_id =  $program_id;
        $this->prof_id = $prof_id;
    }

    public function set_course_abbr($course_abbr) {
        $this->course_abbr = $course_abbr;
    }
    public function set_course_num($course_num) {
        $this->course_num = $course_num;
    }
    public function set_course_title($course_title) {
        $this->course_title = $course_title;
    }
    public function set_course_section($course_section) {
        $this->course_section = $course_section;
    }
    public function set_program_id($program_id) {
        $this->program_id = $program_id;
    }
    public function set_prof_id($prof_id) {
        $this->prof_id = $prof_id;
    }

    public function get_course_id() {
        return $this->course_id;
    }
    public function get_course_abbr() {
        return $this->course_abbr;
    }
    public function get_course_num() {
        return $this->course_num;
    }
    public function get_course_title() {
        return $this->course_title;
    }
    public function get_course_section() {
        return $this->course_section;
    }
    public function get_program_id() {
        return $this->program_id;
    }
    public function get_prof_id() {
        return $this->prof_id;
    }
}
=======
<?php
class course {
    private $course_id;
    private $course_abbr;
    private $course_num;
    private $course_title;
    private $course_section;
    private $program_id;
    private $prof_id;

    public function __construct($course_abbr, $course_num, $course_title, $course_section, $program_id, $prof_id) {
        $this->course_abbr = $course_abbr;
        $this->course_num = $course_num;
        $this->course_title =  $course_title;
        $this->course_section = $course_section;
        $this->program_id =  $program_id;
        $this->prof_id = $prof_id;
    }

    public function set_course_abbr($course_abbr) {
        $this->course_abbr = $course_abbr;
    }
    public function set_course_num($course_num) {
        $this->course_num = $course_num;
    }
    public function set_course_title($course_title) {
        $this->course_title = $course_title;
    }
    public function set_course_section($course_section) {
        $this->course_section = $course_section;
    }
    public function set_program_id($program_id) {
        $this->program_id = $program_id;
    }
    public function set_prof_id($prof_id) {
        $this->prof_id = $prof_id;
    }

    public function get_course_id() {
        return $this->course_id;
    }
    public function get_course_abbr() {
        return $this->course_abbr;
    }
    public function get_course_num() {
        return $this->course_num;
    }
    public function get_course_title() {
        return $this->course_title;
    }
    public function get_course_section() {
        return $this->course_section;
    }
    public function get_program_id() {
        return $this->program_id;
    }
    public function get_prof_id() {
        return $this->prof_id;
    }
}
>>>>>>> 6ec8a85d6aa073b4de35f51897edd90ab3e7a185
