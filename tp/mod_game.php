<?
include("header.php");
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";
$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$dates = $_GET["dates"];
$cName = $_GET["cName"];
$game = $_GET["game"];
$query = "select * from detail natural join champion natural join gamer where dates='$dates' and cName='$cName' and game='$game' order by sets asc, outcome, line asc";
$res = mysqli_query($conn, $query);
if (!$res) {
        die('Query Error s: ' . mysqli_error());
    }

$set = array();
$count = 0;
while($row = mysqli_fetch_array($res)) {
    $set[$count] = $row['sets'];
    $count += 1;
}

mysqli_data_seek($res,0);
$action = "?dates={$dates}&cName={$cName}&game={$game}&sets=";
#echo "{$action}";
?>
<script type="text/javascript">
	function select(val, tf) {
		
		if (!tf) location.href= val;
		else if(confirm("데이터가 저장되지 않을 수 있습니다.") == true) location.href= val;
		
	}
	
	function CH(champ, imgid) {
                            	var con = document.getElementById(imgid);
                            	<?
                            	
                            	?>
                            	
                            	
                            	con.src = champ;
                            	

                            }
</script>

<link rel="stylesheet" href="style2.css?sadddsjr">
<div class='container'>
    <!--<script type="text/javascript"  src="func.js"></script>-->
	<form name="game_form" action="mod_complete.php" method="post" class="fullwidth">
            <input type="hidden" name="dates" value="<?=$dates?>"/>
            <input type="hidden" name="cName" value="<?=$cName?>"/>
            <input type="hidden" name="game" value="<?=$game?>"/>
            <h3>경기 정보 <?=$mode?></h3>
            <p>
                <label for="set_id"><?if($tf = array_key_exists("sets",$_GET)) echo "{$_GET['sets']}";?></label>
                <?
                echo "<select name='set_id' id='set_id' onchange=\"select(this.value, $tf)\">";
                	
                	echo "<option value='-1'>세트를 선택하세요</option>";
                    	$tmp = 0;
                    	$cn = 1;
                        while($tmp < $count) {
                        	#if (array_key_exists('sets',$_GET) and $set[$tmp] == $ans) continue;
                        	$sex = $action.$set[$tmp];
                        	echo "<option value=\"?dates={$dates}&cName={$cName}&game={$game}&sets=$set[$tmp]\">{$cn}세트</option>";
                        	
                        	$cn += 1;
                        	$tmp += 10;
                        }
                    ?>
                </select>
            </p>
    
    <!-- <body class="b915 bCenter" style="background-image: url('http://upload2.inven.co.kr/upload/2019/04/29/bbs/i8202368428.jpg');"> -->
    <div id="lolLayout">
        <div id="lolBody">
        </div>
        <div id="lolMiddle">
            <div class="lolMiddle1">
                <div class="lolMiddle2">
                    <div id='lolMain'>

                        <script type="text/javascript">
                            function viewDetail(match) {
                                var con = document.getElementById(match);
                                if (con.style.display == 'none') {
                                    con.style.display = 'block';
                                } else {
                                    con.style.display = 'none';
                                }


                            }
                            
                            
                        </script>

                        <div id='lolDb'>
                        	<script type="text/javascript">
                        		
                        	</script>
                            <div id="lolDbMatchTeamList" class="scriptorium">

                               

                                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                             if ($tf) {
                                $tmp = 0;
                                $cnt = 1;
                                $wkill = 0;
                                $lkill = 0;
                                $sets = $_GET['sets'];
                                echo "$sets";
                                echo "<input type=\"hidden\" name=\"sets\" value=\"$sets\"/>";
                                $query = "select * from detail natural join champion natural join gamer where dates='$dates' and cName='$cName' and game='$game' and sets='$sets' order by sets asc, outcome, line asc";
                                $res = mysqli_query($conn, $query);
                                $qq = "select champion, imgsrc from champion order by champion asc";
                                $ress = mysqli_query($conn, $qq);
                                
                                while (true) {
                                    if (!($row = mysqli_fetch_array($res))) {
            							
            	                         break;
                                    }
            						if ($row['outcome'] == '승') {
            							$wres[($cnt-1)%5]=$row;
            							if ($cnt == 1) echo "<input type=\"hidden\" name=\"winteam\" value=\"{$row['team']}\"/>";
            						}
            						else {
            							$lres[($cnt-1)%5] = $row;
            							if ($cnt == 6) echo "<input type=\"hidden\" name=\"losteam\" value=\"{$row['team']}\"/>";
            						}
                    	            if ($cnt % 10 == 0) {
                                        echo "				<div id class='detailTable' style='height:500px;'>";
                                        echo "					<ul class='left' style='height:500px; background-color: #f6f6f6;'>";
                                        
                                        
                                        $tmp  = 0;
                                        while($tmp < 5) {
                                        	$row = $wres[$tmp];
                                        echo "<input type=\"hidden\" name=\"Wid{$tmp}\" value=\"{$row['id']}\"/>";
                                        
                                        echo "						<li style='list-style: none; float:right; height:20%; margin-top: 2px; padding: 0px;'>";
                                        echo "							<div class='icon' style='height:100%;'>";
                                        echo "<div style='height:100%; width:20%; float:left;'>";
                                        
                                        
                                        
                                        
                                        
                                        
                                        echo "								<img id = 'WCI{$tmp}' src='{$row['imgsrc']}' class='champicon' style='float:left;'>";
                                        echo "</div>";
                                        echo "							<div class='player' style='width:80%; height:30px;float:right;'>";
                                        echo "								<select name='WC{$tmp}' id='WC{$tmp}' style='width:30%; float:right;' onchange=\"CH(this.value, 'WCI{$tmp}')\">";
                                        while($c = mysqli_fetch_array($ress)) {
                                        	echo "<option champ = \"{$c['imgsrc']}\" value=\"{$c['imgsrc']}\"";
                                        	if ($c['champion'] == $row['champion']) echo "selected='selected'";
                                        	echo">{$c['champion']}</option>";
                                        }
                                        
                                        mysqli_data_seek($ress,0);
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        echo "								</select>";
                                        echo "								<a class='playername color1' style='text-align:left; color:blue; width:65%; margin:0px 0px 0px 0px;'>";
                                        echo "									<input style='width:60px;' type='text' placeholder='팀 이름' id='Wteam{$tmp}' name='Wteam{$tmp}' value=\"{$row['team']}\">";
                                        echo "									<input style='width:60px;' type='text' placeholder='선수 ID' id='Winid{$tmp}' name='Winid{$tmp}' value=\"{$row['id']}\">";
                                        echo "								</a>";
                                        echo "							</div>"; 
                                        
                                        
                                        echo "								<ul class='p1' style='width:80%; height:25px; float:right; padding:5px 0px 0px 0px;'>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;'>K</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;'>D</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;'>A</li>";
                                        echo "									<li style='list-style: none; float:left; width:35%; height:100%; padding:5px 0px 0px 0px;'>킬관여율</li>";
                                        echo "								</ul>";
                                        		
                                        echo "								<ul class='p2' style='width:80%; height:30px; float:right; padding:5px 0px 0px 0px; margin:0px 0px 0px 0px;'>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='K' id='WK{$tmp}' name='WK{$tmp}' value={$row['K']}></li>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='D' id='WD{$tmp}' name='WD{$tmp}' value={$row['D']}></li>";
                                        echo "									<li style='list-style: none; float:left;width:20%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='A' id='WA{$tmp}' name='WA{$tmp}' value={$row['A']}></li>";
                                        
                                        echo "									<li style='list-style: none; float:left;width:35%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:25px;' type='text' placeholder='kPortion' id='WkPortion{$tmp}' name='WkPortion{$tmp}' value={$row['kPortion']}>%</li>";

                                        echo "								</ul>";
                                        echo "							</div>";
                                        echo "						</li>";
                                        $tmp += 1;
                                        }
			
                                        echo "					</ul>";
                                        echo "					<ul class ='right' style='height:500px; background-color: #f6f6f6;'>";
                                        
                                        
                                        $tmp = 0;
                                        while($tmp < 5) {
                                        $row = $lres[$tmp];
                                        echo "<input type=\"hidden\" name=\"Lid{$tmp}\" value=\"{$row['id']}\"/>";
                                        
                                        echo "						<li style='list-style: none; float:left; height:20%; margin-top: 2px; padding: 0px;'>";
                                        echo "							<div class='icon' style='height:100%;'>";
                                        echo "								<div style='height:100%; width:20%; float:right;'>";
                                    	echo "									<img id ='LCI{$tmp}' src='{$row['imgsrc']}' class='champicon' style='float:right;'>";
                                        echo "								</div>";
                                        echo "								<div class='player' style='width:80%; height:30px; float:left'>";
                                        echo "								<select name='LC{$tmp}' id='LC{$tmp}' style='width:30%; float:left;' onchange=\"CH(this.value, 'LCI{$tmp}')\">";
                                        while($c = mysqli_fetch_array($ress)) {
                                        	echo "<option value=\"{$c['imgsrc']}\"";
                                        	if ($c['champion'] == $row['champion']) echo "selected='selected'";
                                        	echo">{$c['champion']}</option>";
                                        }
                                        mysqli_data_seek($ress,0);
                                        echo "								</select>";
                                        echo "									<a class='playername color1' style='text-align:right; color:red; width:65%; height:26.53px;margin:0px'>";
                                        echo "										<input style='width:60px;' type='text' placeholder='팀 이름' id='Lteam{$tmp}' name='Lteam{$tmp}' value=\"{$row['team']}\">";
                                        echo "										<input style='width:60px;' type='text' placeholder='선수 ID' id='Losid{$tmp}' name='Losid{$tmp}' value=\"{$row['id']}\">";
                                        echo "									</a>";
                                        echo "								</div>";
                                        
                                       
                                        echo "								<ul class='p1' style='width:80%; height:25px; float:left; padding:5px 0px 0px 0px;'>";
                                        echo "									<li style='list-style: none; float:right; width:35%; height:100%; padding:5px 0px 0px 0px;'>킬관여율</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>A</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>D</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>K</li>";
                                        echo "								</ul>";
                                        
                                        
                                        echo "								<ul class='p2' style='width:80%; height:30px; float:left; padding:5px 0px 0px 0px; margin:0px 0px 0px 0px;'>";
                                        echo "									<li style='list-style: none; float:right; width:35%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:25px;' type='text' placeholder='킬관여율' id='LkPortion{$tmp}' name='LkPortion{$tmp}' value={$row['kPortion']}>%</li>";
										echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='A' id='LA{$tmp}' name='LA{$tmp}' value={$row['A']}></li>";
										echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='D' id='LD{$tmp}' name='LD{$tmp}' value={$row['D']}></li>";
                                        echo "									<li style='list-style: none; float:right; width:20%; height:100%; padding:5px 0px 0px 0px;'>";
                                        echo "										<input style='width:20px;' type='text' placeholder='K' id='LK{$tmp}' name='LK{$tmp}' value={$row['K']}></li>";
                                        echo "								</ul>";
                                        echo "							</div>";
                                        echo "						</li>";
                                        $tmp += 1;
                                        	
                                        }
                                        
                                        $res2=array();
                                        echo "					</ul>";
                                        echo "				</div>";
                                        
                                        //mysql_data_seek($res2,10);
                                        
                                    }

                                    $cnt += 1;
                                }
                             }
                                ?><br><br>
                                <?if($tf) {
                                echo "<p align=\"center\"><button class=\"button primary large\" onclick=\"javascript:return validate();\">완료</button></p>";
                                }
                                ?>

            <script>
                function validate() {
                    
                    if(document.getElementById("Wteam0").value != document.getElementById("Wteam1").value || document.getElementById("Wteam0").value != document.getElementById("Wteam2").value || document.getElementById("Wteam0").value != document.getElementById("Wteam3").value || document.getElementById("Wteam0").value != document.getElementById("Wteam4").value) {
                    	alert("팀 명이 같지 않습니다"); return false;
                    }
                    else if (document.getElementById("Lteam0").value != document.getElementById("Lteam1").value || document.getElementById("Lteam0").value != document.getElementById("Lteam2").value || document.getElementById("Lteam0").value != document.getElementById("Lteam3").value || document.getElementById("Lteam0").value != document.getElementById("Lteam4").value) {
						alert("팀 명이 같지 않습니다"); return false;
                    }
                    else if (document.getElementById("WK0").value < 0 || document.getElementById("WK1").value < 0 || document.getElementById("WK2").value < 0 || document.getElementById("WK3").value < 0 || document.getElementById("WK4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("LK0").value < 0 || document.getElementById("LK1").value < 0 || document.getElementById("LK2").value < 0 || document.getElementById("LK3").value < 0 || document.getElementById("LK4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("WD0").value < 0 || document.getElementById("WD1").value < 0 || document.getElementById("WD2").value < 0 || document.getElementById("WD3").value < 0 || document.getElementById("WD4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("LD0").value < 0 || document.getElementById("LD1").value < 0 || document.getElementById("LD2").value < 0 || document.getElementById("LD3").value < 0 || document.getElementById("LD4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("WA0").value < 0 || document.getElementById("WA1").value < 0 || document.getElementById("WA2").value < 0 || document.getElementById("WA3").value < 0 || document.getElementById("WA4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("LA0").value < 0 || document.getElementById("LA1").value < 0 || document.getElementById("LA2").value < 0 || document.getElementById("LA3").value < 0 || document.getElementById("LA4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("WkPortion0").value < 0 || document.getElementById("WkPortion1").value < 0 || document.getElementById("WkPortion2").value < 0 || document.getElementById("WkPortion3").value < 0 || document.getElementById("WkPortion4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    else if (document.getElementById("LkPortion0").value < 0 || document.getElementById("LkPortion1").value < 0 || document.getElementById("LkPortion2").value < 0 || document.getElementById("LkPortion3").value < 0 || document.getElementById("LkPortion4").value < 0) {
                    	alert("0보다 작은 값이 있습니다."); return false;
                    }
                    
                    return true;
                }
            </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>


<?php include ("footer.php"); ?>