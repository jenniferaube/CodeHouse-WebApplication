<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
if (isset($_POST["id"]) && isset($_POST["start"]) && isset($_POST["end"]) && isset($_POST["status"])) {
    $id = $_POST["id"];
    $start = $_POST["start"];
    $end = $_POST["end"];
    $status = $_POST["status"];
//    $results = (new class_dao())->select_by_time($start, $end);
//    $class = $results[0];
//    (new class_dao())->update_class_by_id($class[0], $status);
    (new class_dao())->update_class_by_id($id, $status);
}