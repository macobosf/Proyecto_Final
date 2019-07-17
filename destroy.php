<?PHP
session_start();
session_destroy();
header("location:index.php?msg=Your_notes_is_now_locked");
?>