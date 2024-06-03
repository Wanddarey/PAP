<?php
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