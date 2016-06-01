<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 01/06/16
 * Time: 11:47
 */

if (session_status() === PHP_SESSION_NONE){session_start();}
echo $_SESSION['name'];