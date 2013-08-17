<?php

if (isset($_COOKIE['user']))
    echo "Welcome (Cookie)" . $_COOKIE["user"] . "!<br />";
else
    echo "Welcome guest!<br />";


if (array_key_exists("user", $_SESSION)) {
    echo "what's up (Session): " . $_SESSION['user'];
    echo ' ';
    echo "<a href = '/Member/Logout'>Logout</a>";
}
?>