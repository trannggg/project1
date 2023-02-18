<?php
include "connect_db/connect_db.php";
unset($_SESSION["user"]);
session_unset();
header("location: index.php");