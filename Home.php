<?php
$capchaStr = '';
for ($i = 0; $i < 7; $i++) {
    $capchaStr .= chr(rand(97, 122));
}
$_SESSION['capchr'] = $capchaStr;
?>
<body class="bodyHome">
<div class="imgHome">
</div>
<header>
    <nav>
        <?php include('navcreator.php'); ?>
    </nav>
</header>
<div class="ContentBoxTransparent">
    <br>
    <p>Space is the viod that craves exploring...</br>
        <br>
    <p>Lab2</br>
    <form method='post' action="Lab2.php">
        <input type='number' name="InputAmount">Rows</input>
        <input type='radio' name="ColorButton" value="Red" checked>Red</input>
        <input type='radio' name="ColorButton" value="Green">Green</input>
        <input type='radio' name="ColorButton" value="Blue">Blue</input>
        <button type="submit">Enter</button>
    </form>
    <br>
    <p>Lab3</br>
    <form action="Lab3.php">
        <button>Lab3</button>
    </form>
    <br>
    <p>Lab4</br>
    <form method="post" action="Lab4.php">
        <textarea name='text' rows="16" cols="72"></textarea>
        <button type="submit">Enter</button>
    </form>
    <br>
    <p>Lab5 is on the Survey page</br>
        <br>
    <p>Lab6</br>
    <form action="Lab6.php">
        <button>ShowHistory</button>
    </form>
    <br>
    <p>Lab7</br>
    <form method="post" action="Lab7.php">
        <br><input type="text" name="destination" placeholder="Destination"></input></br>
        <br><input type="text" name="topic" placeholder="Topic"></input></br>
        <textarea name='messg' rows="16" cols="72"></textarea>
        <?php
        echo '  Capcha: ' . $_SESSION['capchr'] . '<br>';
        ?>
        <button type="submit">Send</button>
        <input type="text" name="captch" placeholder="Capture"></input>
    </form>
    <br>
    <p>Animation is on the System page</br>
</div>
<footer>
    @Copyright 2020. All rights reserved.
</footer>
</body>