<?php
  // Set default values
  // 200 - ok
  header("Content-Type: application/json");
  http_response_code(200);

  $request_type = $_GET['type'];
  $folder = '../static/';

  if (strcmp($request_type, 'speakers') == 0) {
    $folder .= 'speakers';
  } elseif (strcmp($request_type, 'organisers') == 0) {
    $folder .= 'organisers';
  } else {
    // request_type missing or invalid
    // 400 - bad request
    http_response_code(400);
    echo '{ "code": 400 }';
    exit();
  }

  $files_arr = scandir($folder);
  $files_arr = array_diff($files_arr, array('.','..') );
  $first = true;

  echo '{ "list": [';
  foreach ($files_arr as $file) {
    if (str_ends_with($file, '.json')) {
      if ($first) {
        $first = false;
      } else {
        echo ',';
      }

      echo '"'.$file.'"';
    }
  }
  echo ']}';

  exit();
?>
