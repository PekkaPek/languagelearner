<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 24/05/16
 * Time: 12:11
 */

if(isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 3): ?>
        <div>
            Setting have been saved.
        </div>
    <?php elseif($status == 4): ?>
        <div>
            Setting not saved.
        </div>
    <?php endif;
}
?>

