<?php
session_start();


session_unset();
$_SESSION = [];
session_destroy();
setcookie('id', '', time() + 3600);
setcookie('syantiik', '', time() + 3600);
echo "<script>                        
                            location.href = 'login.php';
              	     	</script>";
