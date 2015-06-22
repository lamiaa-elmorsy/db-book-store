<!-- Old File from 2012 -->
<html>
    <head>
        <title>Registration Form</title>
        <style type="text/css">
            body{
            background-color: #387C44;
            /*background-color: #C25A7C;*/
        }
        div.box{
            background-color: #F0F0F0 ;
            width: 800px;
            padding: 10px;
            border: 10px;
            margin: auto;
        }
        p.header {
                background-color: #387C44;
          font-size: 40px;
                color: #000099;
                font-weight:bold;
        
            }
            
            p.blue {
                font-size: 25px;
                color: #000099;
        font-weight:bold;
                /* Ezay a3mil hena Underline "tag<u>" ??  */
            }
                      
            p.end {
                font-size: 10px;
            }
        </style>
            <script>
function loadXMLDoc()
{
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","signUp.php",true);
xmlhttp.send();
}
</script>
        <script type="text/javascript">
            function check_email(){
                var pass1 = document.getElementById('pass1');
                if (pass1.value ==0){
                  message.innerHTML = "Empty!";

                  // Please enter a valid email address.
                }
              }
              function check_username_password ( form )
                {

                    if (form.u_name.value == "")
                 {
                    alert( "Please Enter Your Username." );
                    form.u_name.focus();
                    return false ;
                  }
                  else if (form.password.value=="")
                  {
                    alert ("Please Enter Your Password");
                    form.password.focus();
                    return false;
                  }
                  return true ;
                }
        </script>
    </head>
  <!--***********************************************************-->
    <body>
        <div class="box">
            <p class="header" align="center">
                Welcome To My Website
            </p>
            <!-- to change font color or size use : <font> -->
      <!--***********************************************************-->
            <p class="blue">
                    <u>
                        Don't Have an account! Sign Up Now.
                    </u>
            </p>
            <div id="myDiv">
                <table>
                <form action="welcome.php" method="post" onsubmit="return check_username_password(this);">
                <tr>
                  <td>User ID: </td><td><input type="text" name="u_id" /></td>
                </tr>
                <tr>
                  <td>E-mail:</td><td><input type="email" name="email" /></td>
                </tr> 
                <tr>
                  <td>User Name: </td><td><input type="text" name="u_name"/></td>
                </tr>
                <tr>
                <td>Password: </td><td><input type="password" name="password"/></td>
                </tr>  
                <td></td><td><input type="submit" value="Sign Up"> <input type="reset" ></td>
              </form>
              </table>
          </div>
          <p class="end">
                        Copyright Lamiaa Elmorsy
                    </p>
                    <hr/>
                  <!--***********************************************************-->

        </div>
    </body>
</html>