<?php
    header('Access-Control-Allow-Origin: *'); 
    // $img = file_get_contents("php://input");
    $fileid = isset($_POST['ResponseID'])     ? (string) $_POST['ResponseID']     : 0;
    $img = isset($_POST['b64Image'])     ? (string) $_POST['b64Image']     : 0;
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    $data = base64_decode($img);
    
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/jspaint/sketches")) {
        mkdir($_SERVER['DOCUMENT_ROOT'] . "/jspaint/sketches", 0777, true);
    }
    
    $file = $_SERVER['DOCUMENT_ROOT'] . "/jspaint/sketches/".$fileid.'.png';
    
    $success = file_put_contents($file, $data);
    print $success ? $file.' saved.' : 'Unable to save the file.';
?>