<?PHP
session_start();
session_unset();
session_destroy();

if(!empty($_GET))
{
    if($_GET['id']="Admin");
    echo "<script>window.location.href='Admin/Index.php';</script>";
}
else
{
    echo "<script>window.location.href='Index.php';</script>";
}
?>
