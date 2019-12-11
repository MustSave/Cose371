<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수
?>
<link rel="stylesheet" href="style2.css?afjt">
<div class="container">
    <?
    $conn = dbconnect($host, $dbid, $dbpass, $dbname);
    $query = "SELECT
  *
FROM
  gamer
  left outer join (
    select
      distinct id did,
      team
    from
      detail natural
      join (
        select
          id,
          max(dates) as dates
        from
          detail
        group by
          id
      ) a
  ) b on id = did
";
    if (array_key_exists("search_keyword", $_POST)) {  // array_key_exists() : Checks if the specified key exists in the array
        $id = $_POST["search_keyword"];
        $query =  $query . " where id like '%$id%' or team like '%$id%' order by id asc";
    
    }
    $res = mysqli_query($conn, $query);
    if (!$res) {
         die('Query Error : ' . mysqli_error());
    }
    ?>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>소환사명</th>
            <th>최근 소속 팀</th>
            <th>주 라인</th>
            <th>경력</th>
            <th>관리</th>
        </tr>
        </thead>
        <tbody>
        <?
        $row_index = 1;
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td><a href='list.php?id={$row['id']}'>{$row['id']}</a></td>";
            echo "<td>{$row['team']}</td>";
            #echo "<td>{$row['line']}</td>";
            if ($row['line'] == 1) echo "<td>TOP</td>";
            else if ($row['line'] == 2) echo "<td>JG</td>";
            else if ($row['line'] == 3) echo "<td>MID</td>";
            else if ($row['line'] == 4) echo "<td>AD</td>";
            else if ($row['line'] == 5) echo "<td>SUP</td>";
            #echo "<td>{$row['career']}</td>";
            echo "<td><textarea readonly id=\"career\" name=\"career\" rows=\"1\">{$row['career']}</textarea></td>";
            echo "<td width='17%'>
                <a href='mod_gamer.php?id={$row['id']}'><button class='button primary small'>수정</button></a>
                 <button onclick='javascript:deleteConfirm(\"{$row['id']}\")' class='button danger small'>삭제</button>
                </td>";
            echo "</tr>";
            $row_index++;
        }
        ?>
        </tbody>
    </table>
    <script>
        function deleteConfirm(id) {
            if (confirm("정말 삭제하시겠습니까?") == true){    //확인
                window.location = "gamer_delete.php?id="+id;
            }else{   //취소
                return;
            }
        }
    </script>
</div>
<? include("footer.php") ?>
