<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
array_push($_SESSION['history'], $_SERVER['REQUEST_URI']);
$usertext = $_POST['text'];
$regexpr = "([\w\d_.-]+@[\w\d_.-]+\.[\w\d_-]+)";
preg_match_all($regexpr, $usertext, $emails);
$handle = fopen("emails.txt", "w");
$outstring = $usertext;
for ($i = 0; $i < count($emails[0]); $i++) {
    $outstring = str_replace($emails[0][$i], '<a href="mailto:' . $emails[0][$i] . '" style="color:#FF0000;">' . $emails[0][$i] . '</a> ', $outstring);
    fwrite($handle, $emails[0][$i]);
    fwrite($handle, "\r\n");
}
echo $outstring;
fclose($handle);
?>