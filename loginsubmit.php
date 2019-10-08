<? ob_start(); ?>
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
                if($uname == $dbusername && $pass == $dbpassword && $dbusertype == "1")
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                        $_SESSION['sess_type'] = $dbusertype;
                         $_SESSION['acct_name'] = $acct_name;
                            /* Redirect browser */
                            echo "<script type='text/javascript'>location.href = 'index_admin';</script>";
                    }

                elseif ($uname == $dbusername && $pass == $dbpassword && "2" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                            /* Redirect browser */
                            echo "<script type='text/javascript'>location.href = 'index_prodhead';</script>";
                    }
                
                elseif ($uname == $dbusername && $pass == $dbpassword && "3" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_prodass';</script>";
                    }

                elseif ($uname == $dbusername && $pass == $dbpassword && "4" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_prodplan';</script>";
                    }

                elseif ($uname == $dbusername && $pass == $dbpassword && "5" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_genserv';</script>";
                    }

                elseif ($uname == $dbusername && $pass == $dbpassword && "6" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_operators';</script>";
                    }

                elseif ($uname == $dbusername && $pass == $dbpassword && "7" == $dbusertype) 
                    {
                        session_start();
                        $_SESSION['sess_user'] = $uname;
                           /* Redirect browser */
                          echo "<script type='text/javascript'>location.href = 'index_sales';</script>";
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