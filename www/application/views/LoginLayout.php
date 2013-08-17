<?php echo $content; ?>

<div class="wrapper content">
    <form action='/Member/Login' method='POST'>
        Username:
        <input type='text' name='username'><p/>
        Password:
        <input type='password' name='password'><p/>
        <input type='submit' name='login' value='Log in'>
    </form>
    <a href="/Member/Register">Sign up</a>
</div>