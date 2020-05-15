<?php
$adrlist = new mysqli('localhost', 'root', '', 'IP-bd');
$adrlist->set_charset('UTF8');
$tempUser = $adrlist->query("SELECT * FROM `adress` ORDER BY `count` DESC");
echo '<table width="100%">';
while ($user = $tempUser->fetch_assoc()) {
    echo '<tr style="background-color: Grey; height: 75px;"><td>' . $user['addr'] . '</td><td>' . $user['count'] . '</td></tr>';
}
echo '</table>';
$adrlist->close();
?>