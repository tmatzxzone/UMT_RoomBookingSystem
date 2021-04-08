<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <body>
        <?php
            //unset and destroy the sessions before logging out.
            session_unset();
            session_destroy();
            echo '<script>alert("You Have Logged Out.");</script>';
            header("refresh: 0; url =/booking");
            exit;
        ?>
    </body>
</html>