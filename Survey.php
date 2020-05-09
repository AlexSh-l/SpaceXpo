<body class="bodySurvey">
<div class="imgSurvey">
</div>
<header>
    <nav>
        <?php include('navcreator.php'); ?>
    </nav>
</header>
<div class="ContentBoxTransparent">
    <div class="bodyRegistration">
        <div class="registrationbox">
            <form action="PasswordChanger.php">
                <button>Change password</button>
            </form>
            <div class="greeter">Enter your information</div>
            <form method="post" action="Lab5.php">
                <br><input type="text" name="Nickname" placeholder="Name"></input><br>
                <input type="password" name="Password" placeholder="Password"></input><br>
                <input type="password" name="PasswordRepeat" placeholder="Confirm password"></input><br>
                <button type="submit">Enter Information</button>
            </form>
        </div>
    </div>
</div>
<footer>
    @Copyright 2020. All rights reserved.
</footer>
</body>