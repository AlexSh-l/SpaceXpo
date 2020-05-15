<?php
session_start();
if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}
array_push($_SESSION['history'], $_SERVER['REQUEST_URI']);
if (isset($_POST['PresenceButton'])) {
    if (isset($_POST['CompanyName'], $_POST['CompanyAddress'], $_POST['CompanyTelephone'], $_POST['CompanyWebsite'])) {
        $name = $_POST['CompanyName'];
        $address = $_POST['CompanyAddress'];
        $phone = $_POST['CompanyTelephone'];
        $site = $_POST['CompanyWebsite'];
        if ($name == "" and $address == "" and $phone == "" and $site == "" and $_POST['PresenceButton'] == "Search") {
            companiesOutput();
        } else {
            if ($name !== "" and $_POST['PresenceButton'] == "Search") {
                companySearch($name);
            } else {
                if ($_POST['PresenceButton'] == "Add") {
                    companyAdd($name, $address, $phone, $site);
                } else {
                    echo 'No companies found.';
                    displayForm();
                }
            }
        }
    }
} else {
    displayForm();
}
function companiesOutput()
{
    echo 'Companies:<br>';
    $handle = fopen("companies.csv", "r");
    while (($data = fgetcsv($handle, ",")) !== FALSE) {
        $num = count($data);
        for ($c = 0; $c < $num; $c++) {
            echo $data[$c] . " ";
        }
        echo '<br>';
    }
    fclose($handle);
}

function companySearch($name)
{
    $presence = 0;
    echo 'Search result:<br>';
    $handle = fopen("companies.csv", "r");
    while (($data = fgetcsv($handle, ",")) !== FALSE) {
        $num = count($data);
        if ($name == $data[0]) {
            $presence = 1;
            foreach ($data as $element) {
                echo $element . " ";
            }
            echo '<br>';
        }
    }
    fclose($handle);
    if ($presence == 0) {
        echo 'No such company found';
        unset($_POST['CompanyName']);
        displayForm();
    }
}

function companyAdd($name, $address, $phone, $site)
{
    if ($name == "" or $address == "" or $phone == "" or $site == "") {
        echo 'Incorrect input, fill in all the fields.';
        displayForm();
    } else {
        $inputstr = $name . ',' . $address . ',' . $phone . ',' . $site;
        $handle = fopen("companies.csv", "a");
        fwrite($handle, $inputstr);
        fwrite($handle, "\r\n");
        fclose($handle);
        echo 'The company was successfully added';
    }
}

function displayForm()
{
    echo '<form method="post" action="Lab3.php">';
    echo '<input type="text" name="CompanyName" value=' . (isset($_POST["CompanyName"]) ? $_POST["CompanyName"] : '""') . '>Name</input>';
    echo '<input type="text" name="CompanyAddress" value=' . (isset($_POST["CompanyAddress"]) ? $_POST["CompanyAddress"] : '""') . '>Address</input>';
    echo '<input type="number" name="CompanyTelephone" value=' . (isset($_POST["CompanyTelephone"]) ? $_POST["CompanyTelephone"] : '""') . '>Phone</input>';
    echo '<input type="text" name="CompanyWebsite" value=' . (isset($_POST["CompanyWebsite"]) ? $_POST["CompanyWebsite"] : '""') . '>Email</input><br>';
    echo '<input type="radio" name="PresenceButton" value="Add">Add</input>';
    echo '<input type="radio" name="PresenceButton" value="Search">Search</input>';
    echo '<button type="submit">Enter</button>';
    echo '</form>';
}

?>