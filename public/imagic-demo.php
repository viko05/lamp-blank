<?php

$files = $_FILES['pictures'];
$title = $_POST['title'] ?? '';

$zip = new ZipArchive();
$zipPath = '../var/tmp/creatives.zip';
if (is_file($zipPath)) {
    unlink($zipPath);
}
if (!$zip->open($zipPath, ZipArchive::CREATE)) {
    die('zip failed');
}
foreach ($files['tmp_name'] as $i => $tmpFile) {
    $fileName = $files['name'][$i];

    $commonImg = new Imagick();
    /* Create some objects */
    $titleImage = new Imagick();
    $tmpImg = new Imagick($files['tmp_name'][$i]);
    $draw = new ImagickDraw();
    $pixel = new ImagickPixel('white');

    /* New image */
    $titleImage->newImage(800, 75, $pixel);
    /* Black text */
    $draw->setFillColor('black');
    /* Font properties */
    $draw->setFont('Bookman-DemiItalic');
    $draw->setFontSize(30);
    /* Create text */
    $titleImage->annotateImage($draw, 10, 45, 0,$title);
    /* Give image a format */
    $titleImage->setImageFormat('png');

    $commonImg->addImage($titleImage);
    $commonImg->addImage($tmpImg);

    $commonImg->resetIterator();
    $out = $commonImg->appendImages(true);

    $creativeFileName = "../var/creatives/c-$i.png";
    $resultFile = fopen($creativeFileName, 'a');
    $out->writeImageFile($resultFile);
    $zip->addFile($creativeFileName, $files['name'][$i]);
}

$zip->close();
header("Content-type: application/zip");
header("Content-Disposition: attachment; filename=$zipPath");
header("Content-length: " . filesize($zipPath));
header("Pragma: no-cache");
header("Expires: 0");
//ob_end_clean();
readfile("$zipPath");
exit;



///* Output the image with headers */
//header('Content-type: image/png');
//echo $out;
