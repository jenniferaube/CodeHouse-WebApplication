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
include_once $_SERVER['DOCUMENT_ROOT'] . "/professor/dao/class_dao.php";
$results = (new class_dao())->select_cancelled('0');
if ($results) {
    echo '<script>';
    echo 'toCancel();';
    echo '</script>';
} else {
    echo '<script>';
    echo 'toCancel();';
    echo '</script>';
}