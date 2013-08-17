var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject()
{
    var xmlHttp;

    try
    {
        xmlHttp = new XMLHttpRequest();
    }
    catch (e)

    {
        var XmlHttpVersions = new Array("MSXML2.XMlHTTP.6.0",
                "MSXML2.XMlHTTP.5.0",
                "MSXML2.XMlHTTP.4.0",
                "MSXML2.XMlHTTP.3.0",
                "MSXML2.XMlHTTP",
                "Microsoft.XMlHTTP");
        for (var i = 0; i < XmlHttpVersions.length && !xmlHttp; i++)
        {
            try
            {
                xmlHttp = new ActiveXObject(XmlHttpVersions[i]);
            }
            catch (e) {
            }
        }
    }
    if (!xmlHttp)
        alert("Error crearing XMLHttpRequest");
    else
        return xmlHttp;
}

function CallServer_name()
{
    var js_name = document.getElementById("js_name").value;
    var valid = true;
    if (js_name != "")
    {
        var url = "?url=Member/CheckUserName&username=" + js_name;
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange = handleRequestStateChange_name;
        xmlHttp.send(null);
    } else
    {
        nameDiv = document.getElementById("name_check");
        nameDiv.innerHTML = "<font color='#aaaaaa'>" + "you got an name?" + "</font>";
        valid = false;

    }

    if (valid === false) {
        var validEl = document.getElementById("validName");
        validEl.value = "false";
    }
}

function CallServer_email()
{

    var js_email = document.getElementById("js_email").value;
    var valid = true;
    if (js_email != "")
    {
        var url = "?url=Member/CheckEmail&email=" + js_email;
        xmlHttp.open("GET", url, true);
        xmlHttp.onreadystatechange = handleRequestStateChange_email;
        xmlHttp.send(null);
    } else
    {
        myDiv = document.getElementById("email_check");
        myDiv.innerHTML = "<font color='#aaaaaa'>" + "you got an email?" + "</font>";
        valid = false;
    }

    if (valid === false) {
        var validEl = document.getElementById("validEmail");
        validEl.value = "false";
    }
}

function handleRequestStateChange_name()
{
    nameDiv = document.getElementById("name_check");
    if (xmlHttp.readyState < 4)
    {
        //	nameDiv.innerHTML = "loading...<br/>";
    }
    else if (xmlHttp.readyState == 4)
    {
        if (xmlHttp.status == 200)
        {
            try
            {
                nameDiv.innerHTML = xmlHttp.responseText;
            }
            catch (e)
            {
                alert("error" + e.toString());
            }
        }
        else
        {
            alert("problrm" + e.toString());
        }
    }
}


function handleRequestStateChange_email()
{
    myDiv = document.getElementById("email_check");
    if (xmlHttp.readyState < 4)
    {
        //	myDiv.innerHTML = "loading...<br/>";

    }
    else if (xmlHttp.readyState == 4)
    {
        if (xmlHttp.status == 200)
        {

            try
            {
                myDiv.innerHTML = xmlHttp.responseText;
            }
            catch (e)
            {
                alert("error" + e.toString());
            }
        }
        else
        {
            alert("problrm" + e.toString());
        }
    }
}

function checkpass1()
{
    var Inform = "register";
    var Inputname = "repassword";
    var Form = Inform + "."
    var valid = true;
    eval("Temp=" + Form + Inputname + ".value;");

    var Inputname1 = "password";
    eval("Temp1=" + Form + Inputname1 + ".value");
    if (Temp != Temp1)
    {
        eval(Form + Inputname + ".value='';");
        eval(Form + Inputname1 + ".value='';");
        eval(Form + Inputname1 + ".focus();");
        msg = "not the same";
        msg1 = "";
        var ch1 = document.getElementById("password2");
        ch1.innerHTML = "<font color='#aaaaaa'>" + msg1 + "</font>";
        valid = false;
    }
    else
    {
        msg = "well done!";
    }

    var ch = document.getElementById("password3");
    ch.innerHTML = "<font color='#aaaaaa'>" + msg + "</font>";
    if (valid === false) {
        var validEl = document.getElementById("validRePassword");
        validEl.value = "false";
    }
}

function checkpass()
{
    var Inform = "register";
    var Inputname = "password";
    var Form = Inform + "."
    var valid = true;
    eval("Temp=" + Form + Inputname + ".value;");
    if (Temp == "") {
        msg = "you got a password?";
        valid = false;
    }
    else
    {
        if (Temp.length < 6 || Temp.length > 20)
        {
            msg = "muss between 6-20";
            valid = false;
        }
        else
        {
            msg = "well done!";
        }
    }
    var ch = document.getElementById("password2");
    ch.innerHTML = "<font color='#aaaaaa'>" + msg + "</font>";
    if (valid === false) {
        var validEl = document.getElementById("validPassword");
        validEl.value = "false";
    }
}