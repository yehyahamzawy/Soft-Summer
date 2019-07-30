<?php

// define variables and set to empty values
$GLOBALS['message_error']='';
$name2_error= $name_error =$phone_error = $email_error = $gender_error =$job_error= $websiteErr =$expComm_error= "";
$name2=$name = $email = $gender = $info = $website = $phone=$expComm= ""
;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $name_error = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $name_error = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["job"])) {
    $job_error = "job is required";
  } else {
    $job = test_input($_POST["job"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z 0-9]*$/",$message)) {
        $job_error = "Only letters,numbers and white space allowed"; 
    }
  }


  if (empty($_POST["info"])) {

    $expComm_error = "text is required";
  } else {
    $expComm = test_input($_POST["expComm"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z 0-9]*$/",$message)) {
      $expComm_error = "Only letters,numbers and white space allowed"; 
    }
  }



  if (empty($_POST["phone"])) {
    $phone_error = "phone is required";
  } else {
    $phone = test_input($_POST["phone"]);

    if (preg_match('/[0-9]{12}/', $phone)) {
        $phone_error = "Only 11 number is accepted"; 
    }
  }


  if (empty($_POST["email"])) {
    $email_error = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $email_error = "Invalid email format"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
  
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>