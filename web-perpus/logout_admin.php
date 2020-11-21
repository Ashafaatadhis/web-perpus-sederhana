<?php
session_start();


session_unset();
$_SESSION = [];
session_destroy();
echo "<script>                        
                            location.href = 'login_admin.php';
              	     	</script>";
