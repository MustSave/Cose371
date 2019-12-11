<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$dates = $_POST['dates'];
$cName = $_POST['cName'];
$game = $_POST['game'];
$sets = $_POST['sets'];
$Wteam = $_POST['Wteam0'];
$winteam = $_POST['winteam'];
$Lteam = $_POST['Lteam0'];
$losteam = $_POST['losteam'];

$WC0 = $_POST['WC0'];
$WC1 = $_POST['WC1'];
$WC2 = $_POST['WC2'];
$WC3 = $_POST['WC3'];
$WC4 = $_POST['WC4'];

$q = "select champion from champion where imgsrc=\"$WC0\"";
$ret = mysqli_query($conn, $q);
$W0 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$WC1\"";
$ret = mysqli_query($conn, $q);
$W1 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$WC2\"";
$ret = mysqli_query($conn, $q);
$W2 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$WC3\"";
$ret = mysqli_query($conn, $q);
$W3 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$WC4\"";
$ret = mysqli_query($conn, $q);
$W4 = mysqli_fetch_array($ret)['champion'];

$Wid0 = $_POST['Wid0'];
$Wid1 = $_POST['Wid1'];
$Wid2 = $_POST['Wid2'];
$Wid3 = $_POST['Wid3'];
$Wid4 = $_POST['Wid4'];
$Winid0 = $_POST['Winid0'];
$Winid1 = $_POST['Winid1'];
$Winid2 = $_POST['Winid2'];
$Winid3 = $_POST['Winid3'];
$Winid4 = $_POST['Winid4'];
$WK0 = $_POST['WK0'];
$WK1 = $_POST['WK1'];
$WK2 = $_POST['WK2'];
$WK3 = $_POST['WK3'];
$WK4 = $_POST['WK4'];
$WD0 = $_POST['WD0'];
$WD1 = $_POST['WD1'];
$WD2 = $_POST['WD2'];
$WD3 = $_POST['WD3'];
$WD4 = $_POST['WD4'];
$WA0 = $_POST['WA0'];
$WA1 = $_POST['WA1'];
$WA2 = $_POST['WA2'];
$WA3 = $_POST['WA3'];
$WA4 = $_POST['WA4'];
$WkPortion0 = $_POST['WkPortion0'];
$WkPortion1 = $_POST['WkPortion1'];
$WkPortion2 = $_POST['WkPortion2'];
$WkPortion3 = $_POST['WkPortion3'];
$WkPortion4 = $_POST['WkPortion4'];

$LC0 = $_POST['LC0'];
$LC1 = $_POST['LC1'];
$LC2 = $_POST['LC2'];
$LC3 = $_POST['LC3'];
$LC4 = $_POST['LC4'];
$q = "select champion from champion where imgsrc=\"$LC0\"";
$ret = mysqli_query($conn, $q);
$L0 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$LC1\"";
$ret = mysqli_query($conn, $q);
$L1 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$LC2\"";
$ret = mysqli_query($conn, $q);
$L2 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$LC3\"";
$ret = mysqli_query($conn, $q);
$L3 = mysqli_fetch_array($ret)['champion'];
$q = "select champion from champion where imgsrc=\"$LC4\"";
$ret = mysqli_query($conn, $q);
$L4 = mysqli_fetch_array($ret)['champion'];
$Lid0 = $_POST['Lid0'];
$Lid1 = $_POST['Lid1'];
$Lid2 = $_POST['Lid2'];
$Lid3 = $_POST['Lid3'];
$Lid4 = $_POST['Lid4'];
$Losid0 = $_POST['Losid0'];
$Losid1 = $_POST['Losid1'];
$Losid2 = $_POST['Losid2'];
$Losid3 = $_POST['Losid3'];
$Losid4 = $_POST['Losid4'];
$LK0 = $_POST['LK0'];
$LK1 = $_POST['LK1'];
$LK2 = $_POST['LK2'];
$LK3 = $_POST['LK3'];
$LK4 = $_POST['LK4'];
$LD0 = $_POST['LD0'];
$LD1 = $_POST['LD1'];
$LD2 = $_POST['LD2'];
$LD3 = $_POST['LD3'];
$LD4 = $_POST['LD4'];
$LA0 = $_POST['LA0'];
$LA1 = $_POST['LA1'];
$LA2 = $_POST['LA2'];
$LA3 = $_POST['LA3'];
$LA4 = $_POST['LA4'];
$LkPortion0 = $_POST['LkPortion0'];
$LkPortion1 = $_POST['LkPortion1'];
$LkPortion2 = $_POST['LkPortion2'];
$LkPortion3 = $_POST['LkPortion3'];
$LkPortion4 = $_POST['LkPortion4'];


$query="update detail set team = \"$Wteam\", champion=\"$W0\", K = $WK0, D = $WD0, A = $WA0, kPortion=$WkPortion0 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid0\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
echo "$query<br>";
$query="update detail set id=\"$Winid0\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid0\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Wteam\", champion=\"$W1\", K = $WK1, D = $WD1, A = $WA1, kPortion=$WkPortion1 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid1\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Winid1\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid1\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Wteam\", champion=\"$W2\", K = $WK2, D = $WD2, A = $WA2, kPortion=$WkPortion2 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid2\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Winid2\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid2\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Wteam\", champion=\"$W3\", K = $WK3, D = $WD3, A = $WA3, kPortion=$WkPortion3 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid3\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Winid3\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid3\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Wteam\", champion=\"$W4\", K = $WK4, D = $WD4, A = $WA4, kPortion=$WkPortion4 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid4\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Winid4\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Wid4\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Lteam\", champion=\"$L0\", K = $LK0, D = $LD0, A = $LA0, kPortion=$LkPortion0 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid0\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Losid0\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid0\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Lteam\", champion=\"$L1\", K = $LK1, D = $LD1, A = $LA1, kPortion=$LkPortion1 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid1\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Losid1\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid1\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Lteam\", champion=\"$L2\", K = $LK2, D = $LD2, A = $LA2, kPortion=$LkPortion2 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid2\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Losid2\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid2\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Lteam\", champion=\"$L3\", K = $LK3, D = $LD3, A = $LA3, kPortion=$LkPortion3 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid3\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Losid3\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid3\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}
echo "$query<br>";
$query="update detail set team = \"$Lteam\", champion=\"$L4\", K = $LK4, D = $LD4, A = $LA4, kPortion=$LkPortion4 where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid4\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
    msg('Query Error : '.mysqli_error($conn));
}
$query="update detail set id=\"$Losid4\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and sets = \"$sets\" and id = \"$Lid4\"";
$ret = mysqli_query($conn, $query);
if(!$ret)
{
        msg('등록된 선수가 아니거나 한 게임에 동일한 선수가 있습니다.');
}


if ($winteam != $Wteam) {
	$query = "update detail set team = \"$Wteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team = \"$winteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
	$query = "update fight set team1 = \"$Wteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team1 = \"$winteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
	$query = "update fight set team2 = \"$Wteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team2 = \"$winteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
}

if ($losteam != $Lteam) {
	$query = "update detail set team = \"$Lteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team = \"$losteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
	$query = "update fight set team1 = \"$Lteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team1 = \"$losteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
	$query = "update fight set team2 = \"$Lteam\" where dates=\"$dates\" and cName = \"$cName\" and game = \"$game\" and team2 = \"$losteam\"";
	$ret = mysqli_query($conn, $query);
	if(!$ret) msg('Query Error : '.mysqli_error($conn));
}

{
    s_msg ('성공적으로 수정 되었습니다');
    echo "<meta http-equiv='refresh' content='0;url=mod_game.php?dates={$dates}&cName={$cName}&game={$game}&sets={$sets}'>";
}
echo "$query<br>";
?>

