<?php
if (isset($_POST['Nickname']) && isset($_POST['Password']) && isset($_POST['PasswordRepeat'])) {
    $name = filter_var(trim($_POST['Nickname']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['Password']), FILTER_SANITIZE_STRING);
    $passApproved = filter_var(trim($_POST['PasswordRepeat']), FILTER_SANITIZE_STRING);
    if ($name !== "" && $pass !== "" && $passApproved !== "") {
        $checker = 0;
        if (mb_strlen($name) > 20) {
            echo "Name has too many characters";
            $checker = 1;
        } else if (mb_strlen($pass) > 12 || mb_strlen($pass) < 5 || mb_strlen($passApproved) > 12 || mb_strlen($passApproved) < 5) {
            echo "Incorrect password length";
            $checker = 1;
        }
        if ($checker == 0 && $pass === $passApproved) {
            $pass = sha1($pass);
            $userlist = new mysqli('localhost', 'root', '', 'registr-bd');
            $userlist->set_charset('UTF8');
            $tempUser = $userlist->query("SELECT * FROM `users` WHERE `name`='$name' AND `passwrd`='$pass'");
            $user = $tempUser->fetch_assoc();
            if ($user === NULL) {
                $userlist->query("INSERT INTO `users` (`name`, `passwrd`) VALUES('$name', '$pass')");
                echo "You have been successfully registered";
            } else {
                echo "This user already exists";
            }
            $userlist->close();
        } else {
            echo "Different passwords";
        }
    } else {
        echo "Please, fill in the form";
    }
} else {
    if (isset($_POST['Name']) && isset($_POST['oldPassword']) && isset($_POST['newPassword'])) {
        $userName = filter_var(trim($_POST['Name']), FILTER_SANITIZE_STRING);
        $oldPass = filter_var(trim($_POST['oldPassword']), FILTER_SANITIZE_STRING);
        $newPass = filter_var(trim($_POST['newPassword']), FILTER_SANITIZE_STRING);
        if ($userName !== "" && $oldPass !== "" && $newPass !== "") {
            $checker = 0;
            if (mb_strlen($userName) > 20) {
                echo "Name has too many characters";
                $checker = 1;
            } else if (mb_strlen($oldPass) > 12 || mb_strlen($oldPass) < 5 || mb_strlen($newPass) > 12 || mb_strlen($newPass) < 5) {
                echo "Incorrect password length";
                $checker = 1;
            }
            if ($checker == 0) {
                $oldPass = sha1($oldPass);
                $newPass = sha1($newPass);
                $userlist = new mysqli('localhost', 'root', '', 'registr-bd');
                $userlist->set_charset('UTF8');
                $tempUser = $userlist->query("SELECT * FROM `users` WHERE `name`='$userName' AND `passwrd`='$oldPass'");
                $user = $tempUser->fetch_assoc();
                if ($user === NULL) {
                    echo "This user doesn't exist";
                } else {
                    $userlist->query("UPDATE `users` SET `passwrd`='$newPass' WHERE `name`='$userName' AND `passwrd`='$oldPass'");
                    echo "Your password has been changed";
                }
                $userlist->close();
            }
        } else {
            echo "Please, fill in the form";
        }
    }
}
?>