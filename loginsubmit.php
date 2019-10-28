<? ob_start(); 
session_start();?>
<?php
if(!empty($_POST['uname']) && !empty($_POST['pass'])) {
	$uname = $_POST['uname'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT * FROM tbl_useraccounts WHERE uname = '".$uname."' AND pass = '".$pass."'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	
	  if($row != 0)
	  {
	  $dbusername = $row['uname'];
      $dbpassword = $row['pass'];
      $dbusertype = $row['user_type'];  /* Check LEGENDS(ACCOUNTTYPE).txt */
      $acct_name = $row['fname'];
      $status = $row['status'];
                if($uname == $dbusername && $pass == $dbpassword && $dbusertype == "1" && $status == "0")
                    {
                        session_start();
                          $_SESSION['sess_user'] = $uname;
                          $_SESSION['sess_type'] = $dbusertype;
                          $_SESSION['acct_name'] = $acct_name;
                            /* Redirect browser */
                            echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                            //exit();
                    }

            else if ($uname == $dbusername && $pass == $dbpassword && "2" == $dbusertype && $status == "0") 
                    {
                        session_start();
                          $_SESSION['sess_user'] = $uname;
                          $_SESSION['sess_type'] = $dbusertype;
                          $_SESSION['acct_name'] = $acct_name;
                       // $_SESSION['sess_user'] = $uname;
                            /* Redirect browser */
                            echo "<script type='text/javascript'>location.href = 'index_prodhead';</script>";
                    }
                
            else if ($uname == $dbusername && $pass == $dbpassword && "3" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_prodass';</script>";
                    }

            else if ($uname == $dbusername && $pass == $dbpassword && "4" == $dbusertype) 
                    {
                        session_start();
                          $_SESSION['sess_user'] = $uname;
                          $_SESSION['sess_type'] = $dbusertype;
                          $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_prodplan';</script>";
                    }

            else if ($uname == $dbusername && $pass == $dbpassword && "5" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = '';</script>";
                    }

            else if ($uname == $dbusername && $pass == $dbpassword && "6" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_sales';</script>";
                    }

            else if ($uname == $dbusername && $pass == $dbpassword && "7" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_operators';</script>";
                    }
            else if ($uname == $dbusername && $pass == $dbpassword && "8" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_genserv';</script>";
                    }
            else if ($uname == $dbusername && $pass == $dbpassword && "9" == $dbusertype && $status == "0") 
                    {
                        session_start();
                         $_SESSION['sess_user'] = $uname;
                         $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = '';</script>";
                    }
            else if($status == "1"){
                     echo "<script type='text/javascript'>alert('Account Deactivated!');</script>";
                  }
                
                } 
                else 
                {
                echo "<script type='text/javascript'>alert('Invalid username or password!')</script>";
                }
	  } 
	  else 
	  {
		 echo "<script type='text/javascript'>alert('All fields are required!')</script>";
		
		  }

            ?>
            <? ob_flush(); ?>