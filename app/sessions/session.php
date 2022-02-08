<?php
session_start();
if (!isset($_SESSION['p_id'])){
    header('Location: ' .BASE_URL.'');
}