<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$dates = $_GET['dates'];
$cName = $_GET['cName'];
$game = $_GET['game'];

$ret = mysqli_query($conn, "delete from detail where dates=\"$dates\" and cName=\"$cName\" and game=\"$game\"");
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$ret = mysqli_query($conn, "delete from fight where dates=\"$dates\" and cName=\"$cName\" and game=\"$game\"");

if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
else
{
    s_msg ('성공적으로 삭제 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=championship_form.php'>";
}

?>

