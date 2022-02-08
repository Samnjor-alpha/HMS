<?php
const BASE_URL = 'https://localhost/hms';


const USER = "root";
const HOST = "localhost";
const DB = "hms";
const DBPWD = "";

$conn = mysqli_connect(HOST,USER,DBPWD,DB);
global $conn;
//Text constants
const PHONE= "+233555396154";
const APP_NAME="Wilson Medical Center";
const EMAIL= "info@wilsonmedicalcenter.com";
const ptnt_loginTittle= "HMS Patient Login";
const ptnt_logindesc= "Login  to book Appointment";
const ptnt_regTittle= "HMS Patient Registration";
const ptnt_regdesc= "Register  to book Appointment";
const currency="Ksh";

//Text constants