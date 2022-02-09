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

const EMAIL_USE_SMTP = true;
const EMAIL_SMTP_HOST = "smtp.gmail.com";
const EMAIL_SMTP_AUTH = true;
const EMAIL_SMTP_USERNAME = "wilsonmedicalcenter1@gmail.com";
const EMAIL_SMTP_PASSWORD = "WilS100%123";
const EMAIL_SMTP_PORT = 587;
const EMAIL_SMTP_ENCRYPTION = "tsl";


const EMAIL_NOTIFICATION_CONTENT = "your account was Created successfully.Login to book an appointment with a qualified Doctor.";

const EMAIL_NOTIFICATION_SUBJECT = "Account Created successfully!!";
const EMAIL_NOTIFICATION_FROM_NAME = "Wilson Medical Center";

//Text constants