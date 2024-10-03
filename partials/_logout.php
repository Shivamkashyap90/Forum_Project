<?php
session_start();
echo "Loging out please wait.";
session_unset();
session_destroy();
header("location: /forum_project/index.php?logout=true");
