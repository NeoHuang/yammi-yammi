<html>
    <body>
        <?php echo YHtml::scriptFile('ajax.js') ?>
        <?php echo $content; ?>
        <form enctype = 'multipart/form-data' method = 'POST' action = '?url=Member/Register' name = 'register'>
            <div class="wrapper content">
                <div class="columns_container">
                    Username
                    <input type='text' name='name' id='js_name' onBlur='CallServer_name()'>
                    <div id='name_check'></div>
                </div>
                <br/>

                <div>
                    Email
                    <input type='text' name='email' id='js_email' onBlur='CallServer_email()'>
                    <div id='email_check'></div>
                </div>
                <br/>

                <div>
                    Password
                    <input type='password' name='password' id='userpwd' onBlur='checkpass()'>
                    <div id='password2'></div>
                </div>
                <br/>
                <div>
                    Password confirm
                    <input type='password' name='repassword' id='reuserpwd' onBlur='checkpass1()'>
                    <div id='password3'></div>
                </div>
                <br/>
                <div>
                    <input type='submit' name='reg' value='submit' />
                </div>

            </div>
        </form>

    </body>
</html>
