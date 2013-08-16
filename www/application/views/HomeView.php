

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php echo YHtml::cssFile('master.css') ?>
        <?php echo YHtml::cssFile('header.css') ?>
        <?php echo YHtml::cssFile('menu.css') ?>
    </head>
    <body>

        <?php
        if (isset($_COOKIE['user']))
            echo "Welcome " . $_COOKIE["user"] . "!<br />";
        else
            echo "Welcome guest!<br />";


        if (array_key_exists("user", $_SESSION)) {
            echo "what's up: " . $_SESSION['user'];
            echo ' ';
            echo "<a href = '?url=Member/Logout'>Logout</a>";
        }
        ?>


        <div class="fixed_navigation">
            <div class="wrapper">
                <nav class="headerNav">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Portfolio</a></li>
                        <li><a href="?url = Member/Login">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </body>
</html>
