<script>
    function toCancel() {
        setTimeout(function () {
            window.location = './cancel_message.php';
        }, 5000);  // after 5 seconds, go to the cancel_message page
    }

    function refresh() {
        setTimeout(function () {
            window.location = './index.php';
        }, 300000);  // refresh this page every 5 mins
    }
</script>
<?php
/*
 * File: cancel_on_welcome.php
 * Author: Chao Gu
 * Course: CST8334 - 310
 * Project: Final project
 * Date: Mar, 2018
 * Professor: Anu Thomas, Howard Rosenblum
 */
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
//fetch all data
$results = (new class_dao())->select_cancelled('0');
//if data is not null, go to the cancellation page, if not, refresh every 5 mins
if ($results) {
    echo '<script>';
    echo 'toCancel();';
    echo '</script>';
} else {
    echo '<script>';
    echo 'refresh();';
    echo '</script>';
}
