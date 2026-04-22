<?php
// enable us to use Headers
ob_start();

// set sessions
if (!isset($_SESSION)) {
    session_start();
}

// set timezone
date_default_timezone_set("Asia/Bangkok");

// set value
$main_description = "tours management system by Love Island Co., Ltd.";
$main_keywords = "tours management system";
// $main_author = "Love Island Co., Ltd.";
// $main_title = "Love Island Co., Ltd.";
$main_author = "Love Andaman";
$main_title = "Love Andaman";
$hostPageUrl = $_SERVER["HTTP_HOST"] == 'localhost' ? 'storage' : 'http://' . $_SERVER["HTTP_HOST"] . "/storage";
$main_document = "Love Island Co., Ltd. <br>
9/239-240 Sakdidej Rd., Talad Nuea, Muang, Phuket 83000 <br>
โทร: +66 76 390 250 | info@loveandaman.com <br>
www.loveandaman.com <br>";
