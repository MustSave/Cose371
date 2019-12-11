<?
include("header.php");
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";
?>

<link rel="stylesheet" href="style2.css?afjtr">
<div class='container'>

    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "select * from fight order by dates desc, cName, game desc";
    if (array_key_exists("dates", $_GET)) {  // array_key_exists() : Checks if the specified key exists in the array
        // window.location.reload();
        
        
        $dates = $_GET["dates"];
        // $cName = $_POST["cName"];
        $query =   "select * from fight where dates like '$dates%' order by dates desc, cName, game desc";
    }
    if (array_key_exists("cName", $_GET)) {  // array_key_exists() : Checks if the specified key exists in the array
        // window.location.reload();
        
        
        $cName = $_GET["cName"];
        // $cName = $_POST["cName"];
        $query =   "select * from fight where dates like '$dates%' and cName like '%$cName%' order by dates desc, cName, game desc";
    }
    if (array_key_exists("game", $_GET)) {  // array_key_exists() : Checks if the specified key exists in the array
        // window.location.reload();
        
        
        $game = $_GET["game"];
        // $cName = $_POST["cName"];
        $query =   "select * from fight where dates like '$dates%' and cName like '%$cName%' and game like '%$game%' order by dates desc, cName, game desc";
    }
    
    $action = "championship_form.php";
    $res = mysqli_query($conn, $query);
    if (!$res) {
        die('Query Error : ' . mysqli_error());
    }
    ?>

    <div id="lolDbMatchPlayerList" class="scriptorium">
        
        <?
        include "matchtable.php";
        ?>
        
        <!-----------------------------------------------------------------------------------------------></br></br>
        
        <div class="listTable" style="margin:auto;">
            <table cellspacing=0 cellpadding=0 id="lolMatchTable">
                <colgroup>
                    <col width=10%>
                    <col width=35%>
                    <col width=20%>
                    <col width=5%>
                    <col width=20%>
                    <col width=10%>
                </colgroup>
                <thead>
                    <tr>
                        <th>일자</th>
                        <th>경기 정보</th>
                        <th>Team 1</th>
                        <th></th>
                        <th>Team 2</th>
                        <th>관리</th>
                    </tr>
                </thead>
                <tbody>
                    <?
                    
                    while ($row = mysqli_fetch_array($res)) {
                        echo "<tr>";
                        // echo "<td>{$row_index}</td>";
                        echo "<td>{$row['dates']}</td>";
                        echo "<td><a href='game.php?dates={$row['dates']}&cName={$row['cName']}&game={$row['game']}'>{$row['cName']} {$row['game']}</a></td>";


                        echo "<td><b>{$row['team1']}</b></td>";
                        echo "<td> VS </td>";
                        echo "<td><b>{$row['team2']}</b></td>";


                        echo "<td width='17%'>
                <a href='mod_game.php?dates={$row['dates']}&cName={$row['cName']}&game={$row['game']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm(\"{$row['dates']}\", \"{$row['cName']}\", \"{$row['game']}\")' class='button danger small'>삭제</button>
                </td>";

                        echo "</tr>";
                       
                    }
                    ?>
                </tbody>

            </table>
            <script>
        function deleteConfirm(dates, cName, game) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
				//alert("막아놨지롱");
                 window.location = "game_delete.php?dates=" + dates+'&cName='+cName+'&game='+game;
            }else{   //취소
                return;
            }
        }
    </script>
        </div>
    </div>
</div>
<? include("footer.php"); ?>