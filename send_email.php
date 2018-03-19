<?php
/**
 * Created by PhpStorm.
 * User: Zach
 * Date: 3/19/2018
 * Time: 12:37 PM
 */

class send_email{

    private $toStudent;
    private $toProf;
    private $subject = "Algonquin Kiosk Appointment Request";
    private $message;

    private $studentName;
    private $profName;

    function __construct($toStudent, $studentName, $profName, $toProf){
        $this->toStudent = $toStudent;
        $this->toProf = $toProf;
        $this->studentName = $studentName;
        $this->profName = $profName;
    }

    public function sendStudent($message, $date){
        $this->message = "Hello " . $this->studentName
            . "!\n\nYou have requested an appointment with " . $this->profName . " at " . $date . ".\n\n"
            . "The following is a copy of the message: \n\n" . $message;
        if (mail($this->toStudent, $this->subject, $this->message)) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }
    }

    public function sendProf($message, $date){
        $this->message = "Hello " . $this->profName
            . "!\n\nYou have an appointment request from " . $this->studentName . " at " . $date . ".\n\n"
            . "Student's Message: \n\n" . $message;
        if (mail($this->toProf, $this->subject, $this->message)) {
            echo "SUCCESS";
        } else {
            echo "ERROR";
        }
    }


}