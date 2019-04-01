<?php
session_start();
//use unset() to clear session
unset($_SESSION['ses_id']);
unset($_SESSION['email']);
unset($_SESSION['status']);
//use session_destroy() to clear and destroy all session again
session_destroy();
//redirect index
echo "<meta http-equiv='refresh' content='1;URL=index.php'>";

?>