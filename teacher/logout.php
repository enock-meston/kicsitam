<?php
session_start();
include("includes/config.php");
$_SESSION['tid']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="../login.php";
</script>
