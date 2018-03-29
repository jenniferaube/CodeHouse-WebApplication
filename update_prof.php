<?php
/*
 *File: update_prof.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Ass: 3
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 * Description: RMI Server startup.
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
/*
 * Receive the JSON data from the professor page, if calendar-event's id, start date-time, end date-time, status
 * is set, retrieve back the calendar-events based on id and status.
 * Status 0: canceled calendar-event, 1: original scheduled calendar-event
 */
if (isset($_POST["id"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["status"])) {
    $id = $_POST["id"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $status = $_POST["status"];

    (new class_dao())->update_class_by_id($id, $status);
}
