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
    <p>Animation is on the System page</br>
        <br>
    <p>Lab5 is on the Survey page</br>
</div>
<footer>
    @Copyright 2020. All rights reserved.
</footer>
</body>