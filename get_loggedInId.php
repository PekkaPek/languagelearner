<?php
/**
 * Created by PhpStorm.
 * User: pekka
 * Date: 28/05/16
 * Time: 21:24
 */

if (session_status() === PHP_SESSION_NONE){session_start();}
echo $_SESSION['id'];