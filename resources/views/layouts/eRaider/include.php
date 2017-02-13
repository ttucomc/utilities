<?php
        session_start();

        // $_SESSION['eRaiderDispatchURL'] = "https://www.depts.ttu.edu/dept_name/application_name/index.php";
        $_SESSION['eRaiderDispatchURL'] = "http://utilities.comc.ttu.edu/index.php";
        $_SESSION['eRaiderDBUsername'] = "ESI_MCOM_COMCUTILITIES";
        $_SESSION['eRaiderDBpassword'] = "UlEbUp6jOsUxUvA";
        // $_SESSION['eRaiderFailureURL'] = "<Optional URL goes here in the event of an authentication failure>";
        include resource_path() . '/views/layouts/eRaider/eraider.php';
?>
