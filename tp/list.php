<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<link rel="stylesheet" href="style2.css?afjt">
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    
    
    // if (array_key_exists("id", $_GET)) {  // array_key_exists() : Checks if the specified key exists in the array
        $id = $_GET["id"];
        // $query =  $query . " where id like '%$id%' or team like '%$id%' order by id asc";
    $query = "SELECT id, dates, cName, game, sets from gamer natural join detail where id=\"$id\" order by dates desc";
    
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
        	<th>소환사명</th>
            <th>일시</th>
            <th>대회</th>
            <th>경기</th>
            <th>세트</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['dates']}</td>";
            #echo "<td>{$row['line']}</td>";
            echo "<td>{$row['cName']}</td>";
            echo "<td><a href='game.php?dates={$row['dates']}&cName={$row['cName']}&game={$row['game']}'>{$row['game']}</a></td>";
            echo "<td>{$row['sets']}</td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    
</div>
<? include("footer.php") ?>
