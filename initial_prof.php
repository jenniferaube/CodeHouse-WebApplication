<?php
/*
 *File: update_prof.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
/*
 * Receive the JSON data from the professor page, if a valid prof id is set, then select all of the
 * calendar-events related to this prof. Return back a JSON data to initialize calendar-events.
 * Color: #006341, green background for original scheduled calendar-events
 *        #909390, grey background for any canceled calendar-events
 *        #43B02A, light green background for office hour calendar-events
 * $class[0]:class_id, 1:start, 2:end, 3:room, 4:status, 5:course_abbr, 6:number, 7:section, 8:id
 * $class[8]: id = 99999, indicates this an office hour calendar-event, otherwise it is a normal class
 */
if(isset($_POST["prof_id"])){
    $prof_id = $_POST["prof_id"];
    $results=(new class_dao())->select_all($prof_id);
    $data = array();

    foreach ($results as $class) {
        //If section number is less than 100, add an additional leading 0
        if($class[7]<100) {
            //If class status!=0, it is not canceled
            if($class[4]!=0) {
                //If class is not a office hour, the background is #006341
                if($class[8]!=99999) {
                    $data[] = array(
                        'id' => $class[0],
                        'title' => $class[5] . $class[6] . '-0' . $class[7] . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#006341'
                    );
                } else { //If it is an office hour, the background is #43B02A
                    $data[] = array(
                        'id' => $class[0],
                        'title' => "Office Hour" . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#43B02A'
                    );
                }
            } else { //If class status=0, it is canceled.
                //If class is not a office hour
                if($class[8]!=99999) {
                    $data[] = array(
                        'id' => $class[0],
                        'title' => $class[5] . $class[6] . '-0' . $class[7] . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#909390'
                    );
                } else { //If it is a office hour
                    $data[] = array(
                        'id'   => $class[0],
                        'title'   => "Office Hour".'-Room:'.$class[3],
                        'start'   => $class[1],
                        'end'   => $class[2],
                        'color' => '#909390'
                    );
                }
            }
        } else { //If section number if greater than 100, no need to add leading 0
            if($class[4]!=0) {
                //If class is not a office hour, the background is #006341
                if($class[8]!=99999) {
                    $data[] = array(
                        'id' => $class[0],
                        'title' => $class[5] . $class[6] . '-' . $class[7] . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#006341'
                    );
                } else { //If it is an office hour, the background is #43B02A
                    $data[] = array(
                        'id' => $class[0],
                        'title' => "Office Hour" . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#43B02A'
                    );
                }
            } else { //If class status=0, it is canceled.
                //If class is not a office hour
                if($class[8]!=99999) {
                    $data[] = array(
                        'id' => $class[0],
                        'title' => $class[5] . $class[6] . '-' . $class[7] . '-Room:' . $class[3],
                        'start' => $class[1],
                        'end' => $class[2],
                        'color' => '#909390'
                    );
                } else {//If it is an office hour
                    $data[] = array(
                        'id'   => $class[0],
                        'title'   => "Office Hour".'-Room:'.$class[3],
                        'start'   => $class[1],
                        'end'   => $class[2],
                        'color' => '#909390'
                    );
                }
            }
        }
    }
    echo json_encode($data);
}
