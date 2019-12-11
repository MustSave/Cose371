<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);

if (array_key_exists("cName", $_GET)) {
    $cName = $_GET["cName"];
    $query = "select * from competition where cName=\"$cName\"";
    
    $res = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($res);
    if (!$product) {
        msg("에러");
    }
}
?>
    <div class="container fullwidth">

        <h3>대회 정보</h3>

        <p>
            <label for="cName">대회 명</label>
            <input readonly type="text" id="cName" name="cName" value="<?= $product['cName'] ?>"/>
        </p>
        <div style='text-align:center;'>
        	<!--<div img style='width:100%;'>-->
        		<img src = '<?=$cName?>.png' style='height:300px;'>
        	<!--</div>-->
        </div>
        <p>
            <label for="product_desc">대회 설명</label>
            <textarea style = 'font-size:1.5em;'readonly id="product_desc" name="product_desc" rows="10"><?= $product['intro'] ?></textarea>
        </p>

        
    </div>
<? include("footer.php") ?>