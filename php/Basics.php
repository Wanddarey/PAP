<?php

function isTrue($bool) {
    if ($bool) {
        consoleLog('True');
    } else {
        consoleLog('False');
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function consoleLog($data)
{
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }
    echo "<script>console.log('" . $output . "' );</script>";
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

function get_mime_type(string $filename)
{
    $info = finfo_open(FILEINFO_MIME_TYPE);
    if (!$info) {
        return false;
    }

    $mime_type = finfo_file($info, $filename);
    finfo_close($info);

    return $mime_type;
}

function isMobileChromium() {
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    $mobileChromiumPattern = '/(Chrome|Edg|OPR|Brave|Vivaldi)\/[.0-9]*.*Mobile/';

    if (preg_match($mobileChromiumPattern, $userAgent)) {
        return true;
    }

    return false;
}



/*
function open_session() {
    session_start();
    $_SESSION['is_open'] = TRUE;
}

function close_session() {
  session_write_close();
  $_SESSION['is_open'] = FALSE;
}

function destroy_session() {
  session_destroy();
  $_SESSION['is_open'] = FALSE;
}

function session_is_open() {
  return($_SESSION['is_open']);
}
*/