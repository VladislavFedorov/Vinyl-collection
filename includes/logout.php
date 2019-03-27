<?php

session_start();
session_destroy();
header( string: 'Location: login.php');

exit;