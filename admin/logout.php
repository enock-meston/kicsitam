<?php
session_start();
include("includes/config.php");
$_SESSION['id']=="";
session_unset();
session_destroy();

?>
<script language="javascript">
document.location="index.php";
</script>
