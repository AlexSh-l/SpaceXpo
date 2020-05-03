<?php
if (isset($_POST['InputAmount'], $_POST['ColorButton'])) {
    $userinput = $_POST['InputAmount'];
    $Red = 0;
    $Green = 0;
    $Blue = 0;
    $typeofcolor = 0;
    if ($_POST['ColorButton'] == "Red") {
        $typeofcolor = 1;
    }
    if ($_POST['ColorButton'] == "Green") {
        $typeofcolor = 2;
    }
    if ($_POST['ColorButton'] == "Blue") {
        $typeofcolor = 3;
    }
    if ($userinput >= 10) {
        echo '<table width="100%">';
        for ($i = 1; $i <= $userinput; $i++) {
            if ($typeofcolor == 1) {
                $Red = $Red + 4;
            }
            if ($typeofcolor == 2) {
                $Green = $Green + 4;
            }
            if ($typeofcolor == 3) {
                $Blue = $Blue + 4;
            }
            if ($i % 5 == 0) {
                echo '<tr style = "background-color: Green; height: 120px;"><td> </td></tr>';
            } else {
                echo '<tr style = "background-color:' . 'rgb(' . $Red . ',' . $Green . ',' . $Blue . '); height: 120px;"><td></td></tr>';
            }
        }
        echo '</table>';
    }
}
?>