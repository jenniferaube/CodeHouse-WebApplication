
<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
    <input name="upload_file" type="file"/>
    <input type="submit" name="submit_btn"/>
</form>
<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dto/class_dto.php";

if (isset($_POST['submit_btn'])){
    $file_address = "./file_upload/files/".$_FILES['upload_file']['name'];
    $file = fopen($file_address, "r");
    while (!feof($file)) {
        $class = new class_dto();
        $row = fgetcsv($file);
        if($row[0]=='class_start_time'){
            continue;
        } else {
            $class->set_class_start($row[0]); //$row[0]:class_start_time, 1: class_end_time, 2: class_room, 3: class_status, 4: course_id
            $class->set_class_end($row[1]);
            $class->set_class_room($row[2]);
            $class->set_class_status($row[3]);
            $class->set_class_course_id($row[4]);
            (new class_dao())->delete_class($row[4]);
            (new class_dao())->insert_class($class);
        }
    }
    fclose($file);
    echo "<script language='javascript'>";
    echo 'if(alert("Success to update")){';
    echo 'window.location.reload();}';
    echo "</script>";
}

?>
</body>