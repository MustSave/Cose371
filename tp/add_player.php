<?
include "header.php";
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";      //유틸 함수

$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$mode = "입력";
$action = "gmod_complete.php";

?>
	<link rel="stylesheet" href="style2.css?sadddsjr">
    <div class="container">
        <form name="gamer_form" action="<?=$action?>" method="post" class="fullwidth">
            <input type="hidden" name="p_id" value="<?=$gamer['id']?>"/>
            <input type="hidden" name="mode" value="<?=$mode?>"/>
            <h3>선수 정보 <?=$mode?></h3>
            <p>
                <label for="id">소환사명</label>
                <input type="text" placeholder='소환사명' id='id' name='id' value='<?=$gamer['id']?>'/>
               
            </p>
            <p>
                <label for="line">주 라인</label>
                <select name="line" id="line">
                	<option value=1 <?if ($gamer['line'] == 1) echo "selected='selected'";?> >TOP</option>
                	<option value=2 <?if ($gamer['line'] == 2) echo "selected='selected'";?>>JG</option>
                	<option value=3 <?if ($gamer['line'] == 3) echo "selected='selected'";?>>MID</option>
                	<option value=4 <?if ($gamer['line'] == 4) echo "selected='selected'";?>>AD</option>
                	<option value=5 <?if ($gamer['line'] == 5) echo "selected='selected'";?>>SUP</option>
                </select>
            </p>
            <p>
                <label for="career">경력</label>
                <textarea placeholder="수상 경력을 입력해주세요" id="career" name="career" rows="10"><?=$gamer['career']?></textarea>
            </p>
            

            <p align="center"><button class="button primary large" onclick="javascript:return validate();"><?=$mode?></button></p>

            <script>
                function validate() {
                    if(document.getElementById("id").value == "") {
                        alert ("소환사명을 입력해 주십시오"); return false;
                    }
                    return true;
                }
            </script>

        </form>
    </div>
<? include("footer.php") ?>