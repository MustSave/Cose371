<?
include("header.php");
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";
$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$dates = $_GET["dates"];
$cName = $_GET["cName"];
$game = $_GET["game"];
$query =   "select * from detail natural join champion natural join gamer where dates like '$dates%' and cName like '%$cName%' and game like '%$game%' order by dates desc, cName, game desc, sets asc, team, line asc";
$res = mysqli_query($conn, $query);
$wres2=array();
$lres2=array();
$tmp=0;

if (!$res) {
    die('Query Error : ' . mysqli_error());
}
?>

<link rel="stylesheet" href="style2.css?sadddsjr">

<div class='container'>
    <!--<script type="text/javascript"  src="func.js"></script>-->

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
                            <div id="lolDbMatchTeamList" class="scriptorium">

                                <?
                                include "matchtable.php"
                                ?>

                                <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------->
                                <?php
                                $tmp = 0;
                                $cnt = 1;
                                $wkill = 0;
                                $lkill = 0;
                                
                                while (true) {
                                    if (!($row = mysqli_fetch_array($res))) {
            							
            	                         break;
                                    }
            						if ($row['outcome'] == '승') $wres[($cnt-1)%5]=$row;
            						else $lres[($cnt-1)%5] = $row;
                    	            if ($cnt % 10 == 1) {
                                        echo "<br>";
                                        $wkill = 0;
                                        $lkill = 0;
                                        echo "	<div class='listFrame' id='match5190' style='margin:auto;'>";
                                        echo "		<div class='listTop'>";
                                        echo "			<div class='date' style='width:40%;'>{$row['dates']}</div>";
                                        echo "			<div class='title' style='width:20%;'>20{$row['dates'][0]}{$row['dates'][1]} {$row['cName']}</div>";
                                        echo "			<div class='stage' style='width:37%;'>{$row['game']} {$row['sets']}</div>";
                                        echo "		</div>";
                                    }


                                    if ($cnt % 5 == 1 and $row['outcome'] == '승') {
                                        echo "		<div class='wTeam'>";
                                        echo "  		<div class='leftPart' style='height:72px;'>";
                                        echo "      		<a><br><font size='5em' color='black'>{$row['team']}</font></a>";
                                        echo "  		</div>";
                                        echo "  		<div class='rightPart'style='height:72px;'>";
                                        echo "      		<div class='color1 tx5'>W</div>";
                                        echo "  		</div>";
                                        echo "  		<ul class='pick' width=275px>";
                                    }


                                    if ($cnt % 5 == 1 and $row['outcome'] == '패') {
                                        echo "		<div class='lTeam'>";
                                        echo "  		<div class='leftPart' style='height:72px;'>";
                                        echo "      		<div class='color2 tx5'>L</div>";
                                        echo "  		</div>";
                                        echo "  		<div class='rightPart' style='height:72px;'>";
                                        echo "      		<a><br><font size='5em' color='black'>{$row['team']}</font></a>";
                                        echo "  		</div>";
                                        echo "  		<ul class='pick' width=275px>";
                                    }

                                    if ($row['outcome'] == '승') {
                                        $wkill += $row['K'];
                                    } else {
                                        $lkill += $row['K'];
                                    }


                                    echo "      			<li style='list-style: none'><img style='float:left; display:inline;' width=15%' src='{$row['imgsrc']}'></li>";

                                    if ($cnt % 5 == 0) {
                                        echo "			</ul>";
                                        echo "		</div>";
                                    }

                                    if ($cnt % 10 == 0) {
                                        echo "		<div class='score' style='margin:auto;'>";
                                        echo "		    <div class='killscore'>";
                                        echo "		        <span class='tx3'>KILL SCORE</span>";
                                        echo "		        <span class='tx4'>$wkill : $lkill</span>";
                                        echo "		    </div>";
                                        echo "		</div>";

                                        echo "		<div class='listDetail'>";
                                        
                                        echo "			<a href='javascript:viewDetail(\"{$row['sets']}\")'>";
                                        echo "				펼치기 ▼</a>";
                                        echo "			<div id={$row['sets']} style=\"display: none;\">";
                                        
                                        
                                        
                                        echo "				<div id class='detailTable' style='height:400px;'>";
                                        echo "					<ul class='left' style='height:434px; background-color: #f6f6f6;'>";
                                        
                                        // $tmp = 0;
                                        // while($tmp < 5) {
                                        // $row=mysql_fetch_array($res);
                                        
                                        $tmp  = 0;
                                        while($tmp < 5) {
                                        	$row = $wres[$tmp];
                                        echo "						<li style='list-style: none; float:right; height:20%; padding: 0px 0px;'>";
                                        echo "							<div class='icon'>";
                                        echo "								<img src='{$row['imgsrc']}' class='champicon' style='float:left;'>";
                                        echo "							</div>";
                                        echo "							<div class='player' style='width:270px; float:right;'>";
                                        echo "								<a class='playername color1' style='text-align:left; color:blue; width:100%;'><b>{$row['team']} {$row['id']}</b></a>";
                                        echo "								<ul class='p1' style='width:100%; height:25px;'>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>K</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>D</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>A</li>";
                                        echo "									<li style='list-style: none; float:left; width:30%;'>킬관여율</li>";
                                        echo "								</ul>";
                                        		
                                        echo "								<ul class='p2' style='width:100%; height:25px;'>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>{$row['K']}</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>{$row['D']}</li>";
                                        echo "									<li style='list-style: none; float:left;width:20%;'>{$row['A']}</li>";
                                        echo "									<li style='list-style: none; float:left; width:30%;'>{$row['kPortion']}%</li>";
                                        echo "								</ul>";
                                        echo "							</div>";
                                        echo "						</li>";
                                        $tmp += 1;
                                        }
			
                                        echo "					</ul>";
                                        echo "					<ul class ='right' style='height:434px; background-color: #f6f6f6;'>";
                                        
                                        $tmp = 0;
                                        while($tmp < 5) {
                                        $row = $lres[$tmp];
                                        echo "						<li style='list-style: none; float:left; height:20%; padding: 0px 0px'>";
                                        echo "							<div class='icon'>";
                                    	echo "									<img src='{$row['imgsrc']}' class='champicon' style='float:right;'>";
                                        echo "							</div>";
                                        echo "							<div class='player' style='width:270px; float:left'>";
                                        echo "								<a class='playername color1' style='text-align:right; color:red; width:100%;'><b>{$row['team']} {$row['id']}</b></a>";
                                        echo "								<ul class='p1' style='width:100%; height:25px;'>";
                                        echo "									<li style='list-style: none; float:right; width:30%;'>킬관여율</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>A</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>D</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>K</li>";
                                        echo "								</ul>";
                                        echo "								<ul class='p2' style='width:100%; height:25px;'>";
                                        echo "									<li style='list-style: none; float:right; width:30%;'>{$row['kPortion']}%</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>{$row['A']}</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>{$row['D']}</li>";
                                        echo "									<li style='list-style: none; float:right; width:20%;'>{$row['K']}</li>";
                                        echo "								</ul>";
                                        echo "							</div>";
                                        echo "						</li>";
                                        $tmp += 1;
                                        	
                                        }
                                        $res2=array();
                                        echo "					</ul>";
                                        echo "				</div>";
                                        echo "			</div>";
                                        echo "		</div>";
                                        echo "	</div>";
                                        //mysql_data_seek($res2,10);
                                        
                                    }

                                    $cnt += 1;
                                }
                                ?>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>