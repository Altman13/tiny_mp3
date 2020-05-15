<?php
// if ($_POST['file_name']) {
//     $fn= $_POST['file_name'];
//     $fn_for_play=$fn.'part.mp3';
//     $time_s = intval($_POST['time_start']);
//     $time_e = intval($_POST['time_end']);
//     //TODO: формат времени
//     // будем каждый раз перезаписывать старый файл для воспроизведения
//     exec("ffmpeg -i $fn -ss 00:00:$time_s -to 00:00:.$time_e -c copy $fn_for_play");
// }
function getDirContents($dir, &$results = array())
{
    $files = scandir($dir);
    foreach ($files as $key => $value) {
        $path = realpath($dir . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[$key]['file'] = $value;
        } else if ($value != "." && $value != "..") {
            getDirContents($path, $results);
            $results[$key]['file'] = $path;
        }
    }
    $results = json_encode($results, JSON_UNESCAPED_UNICODE);
    $results = str_replace('\/', '/', $results);
    echo $results;
}
getDirContents('mp3');
// $directory = "mp3";
// $files = scandir ($directory);
// $path = $files[2];
// $results['file'] = $path;
//     $results = json_encode($results, JSON_UNESCAPED_UNICODE);
//     $results = str_replace('\/', '/', $results);
//     echo $results;