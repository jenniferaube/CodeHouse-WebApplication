<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
if(isset($_POST["prof_id"])){
    $prof_id = $_POST["prof_id"];
    $results=(new class_dao())->select_all($prof_id);
    $data = array();

    foreach ($results as $class) {
        if($class[7]<100) {
            if($class[4]!=0) { //$class[0]:class_id, 1:start, 2:end, 3:room, 4:status, 5:abbr, 6:number, 7:section
                $data[] = array(
                    'id'   => $class[0],
                    'title'   => $class[5].$class[6].'-0'.$class[7].'-Room:'.$class[3],
                    'start'   => $class[1],
                    'end'   => $class[2],
                    'color' => '#006341'
                );
            } else {
                $data[] = array(
                    'id'   => $class[0],
                    'title'   => $class[5].$class[6].'-0'.$class[7].'-Room:'.$class[3],
                    'start'   => $class[1],
                    'end'   => $class[2],
                    'color' => '#909390'
                );
            }
        } else {
            if($class[4]!=0) {
                $data[] = array(
                    'id'   => $class[0],
                    'title'   => $class[5].$class[6].'-'.$class[7].'-Room:'.$class[3],
                    'start'   => $class[1],
                    'end'   => $class[2],
                    'color' => '#006341'
                );
            } else {
                $data[] = array(
                    'id'   => $class[0],
                    'title'   => $class[5].$class[6].'-'.$class[7].'-Room:'.$class[3],
                    'start'   => $class[1],
                    'end'   => $class[2],
                    'color' => '#909390'
                );
            }
        }

    }
    echo json_encode($data);
}


