<?php
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host,$dbid,$dbpass,$dbname);

$p_id = $_POST['p_id'];
$mode = $_POST['mode'];
$id = $_POST['id'];
$line = $_POST['line'];
$career = $_POST['career'];
$query = "update gamer set id=\"$id\", line=$line, career=\"$career\" where id = \"$p_id\"";

if ($mode == '수정') {
	if ($career == '') $query = "update gamer set id=\"$id\", line=$line where id = \"$p_id\"";

	if ($p_id != $id) {
 		$ret = mysqli_query($conn, "update detail set id=\"$id\" where id = \"$p_id\"");
 			if(!$ret) {
    			msg('Query Error : '.mysqli_error($conn));
			}
	}

	$ret = mysqli_query($conn, $query);

	if(!$ret) {
    	msg('Query Error : '.mysqli_error($conn));
	}
	else {
    s_msg ('성공적으로 수정 되었습니다');
    	echo "<meta http-equiv='refresh' content='0;url=player_form.php'>";
		echo "$query";
	}
}

else if ($mode == '입력') {
	$query = "insert into gamer values (\"$id\", $line, \"$career\")";
	if ($career == '') $query = "insert into gamer(id, line) values (\"$id\", $line)";
	
	$ret = mysqli_query($conn, $query);
	if(!$ret) {
    	msg('Query Error : '.mysqli_error($conn));
	}
	else {
    s_msg ('성공적으로 수정 되었습니다');
    	echo "<meta http-equiv='refresh' content='0;url=player_form.php'>";
		echo "$query";
	}
}
?>

