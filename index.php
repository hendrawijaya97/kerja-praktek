<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Portal BPR Sejahtera Batam</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script> 

  <link href="css/style.css" rel="stylesheet" type="text/css">
  <script src="js/js.js"></script>
  
<style>
 /*bootstrap class override for login page only*/
            .form-control{
                border-radius: 0px;
                margin: 12px 3px;
                height: 40px;
            }
            .logo{
                margin: auto;
                text-align: center;
                padding-top: 20%;
            }
            .logo img{
                height: 100px;
            }
         

            /*for logintemplate Orange*/
            .grayBody{
                background-color: #ff5800;
            }
            .loginbox{
                margin-top: 5%;
                border-top: 6px solid #ff5800;
                background-color:#fff;
                padding: 20px;
                box-shadow: 0 10px 10px -2px rgba(0,0,0,0.12),0 -2px 10px -2px rgba(0,0,0,0.12);    
            }
            .singtext{    
                font-size: 28px;  
                color: #ff5800;
                font-weight: 500;
                letter-spacing: 1px;
            }
            .submitButton{
                background-color: #ff5800;
                color: #fff;
                margin-top: 12px;
                margin-bottom: 10px;
                padding: 10px 0px;
                width: 100%;
                margin-left: 2px;
                font-size: 16px;
                border-radius: 0px;
                outline: none;
            }
            .submitButton:hover,.submitButton:focus{
                color: #fff;  
                outline: none;
            }
            
</style>

</head>
<body>

   <div class="container" >  
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
            <div class="col-lg-4 col-md-6 col-sm-8">
                <div class="logo">
                    <img src="img/logobprsb.jpg"  alt="Logo"  > 
                </div>
                <form method="post" action="cek_login.php" onsubmit="return validateLogin(this);"> 
                <div class="row loginbox">   
                                
                    <div class="col-lg-12">
                        <span class="singtext" >Sign in </span>   
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <input class="form-control" name="username" id="username" type="text" placeholder="Please enter your user name" required > 
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12">
                        <input class="form-control" name="password" id="password" type="password" placeholder="Please enter password" required>
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12">
                    	<select class="form-control" id="sel1" name="level" >
       						<option value="1">Member</option>
       						<option value="2">Admin</option>
   					   </select>	
                    </div>
                    <div class="col-lg-12  col-md-12 col-sm-12">
                        <button type="submit" class="btn  submitButton" name="Submit" value="Submit">Submit </a> 
                    </div>                     
                    
                </div>
                </form>

            </div>
            <div class="col-lg-4 col-md-3 col-sm-2"></div>
        </div>

        <script type="text/javascript">
    function validateLogin(formObj){
        if(formObj.username.value.trim()==''){
            alert('Mohon isi Username');
            return false;
        }else if(formObj.password.value.trim()==''){
            alert('Mohon isi Password');
            return false;
        }
        formObj.submit.disable = true;
        formObj.submit.value = 'Please Wait';
    }
</script>

</body>
</html>