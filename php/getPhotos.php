<?php
  // Set default values
  // 200 - ok
  header("Content-Type: application/json");
  http_response_code(200);

  $folder = '../static/gallery';

  $dirs_arr = scandir($folder);
  $dirs_arr = array_diff($dirs_arr, array('.','..') );
  $first_dir = true;

  echo '{ "folders": [';
  foreach ($dirs_arr as $dir) {
    $files_arr = scandir($folder.'/'.$dir);
    $files_arr = array_diff($files_arr, array('.','..') );
    $first_file = true;

    if ($first_dir) {
      $first_dir = false;
    } else {
      echo ',';
    }

    echo '{ "name": "'.$dir.'", "photos": [';
    foreach ($files_arr as $file) {
      if ($first_file) {
        $first_file = false;
      } else {
        echo ',';
      }

      echo '"'.$file.'"';
    }
    echo ']}';
  }
  echo ']}';

  exit();
?>

<!-- {
  "folders": [
    {
      "name": "2020",
      "photos": [<string>]
    },
    {
      "name": "2022",
      "photos": [<string>]
    },
    {
      "name": "2019",
      "photos": [<string>]
    }
  ]
} -->