<?php
session_start();

unset($_SESSION['admin_user_id'], $_SESSION['admin_fcaf']);


header('location: candidate-login');