<?php
$db_context = mysqli_connect('localhost', 'root', '', 'do_or_die_auth');
if (!$db_context) {
    die("connection faild");
}
