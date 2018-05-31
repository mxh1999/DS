<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<body>
<a href>  首页 </a>  <br/> <a href>  订票 </a> <br/> <a href>  查票 </a>
    <?php
        session_start();
        if (isset($_SESSION['username'])) {
            echo "<a herf> " . $_SESSION['username'] . "</a>";
        }   else
        {
            echo "<a herf> login </a>";
        }
        session_write_close();
   ?>
</body>
</html>
