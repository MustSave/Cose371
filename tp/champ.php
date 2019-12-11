<?
include("header.php");
include "config.php";    //데이터베이스 연결 설정파일
include "util.php";
$conn = dbconnect($host, $dbid, $dbpass, $dbname);
$query = "select * from champion order by champion asc";
$res = mysqli_query($conn, $query);
if (!$res) {
        die('Query Error : ' . mysqli_error());
    }
?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://rochestb.github.io/jQuery.YoutubeBackground/src/jquery.youtubebackground.js"></script>
<link rel="stylesheet" href="style2.css?afjtr">
<div id="video" class="background-video"></div>
    <script>
        $('#video').YTPlayer({
            fitToBackground: true,
            videoId: 'JO0_ZES0zHw'
        });
    </script>
    <style>
        .background-video {
            background-position: top center;
            background-repeat: no-repeat;
            bottom: 0;
            left: 0;
            overflow: hidden;
            position: fixed;
            right: 0;
            top: 0;
        }
        .navbar {
            z-index:999;
        }
        h1 {
        	padding: 0px 20px 0px 20px;
            text-align:center;
            font-weight:800;
        }
        p {
            padding: 0px 20px 0px 20px;
            text-align:center;
        }
        .container {
            position: relative;
            background: rgba(255, 255, 255, .9);
        }
        .ref {
        	padding : 50px 0px 0px 0px;
            font-weight:200;
            font-size:0.5em;
        }
        </style>
<div class='container' style=';'>
	<h2><b>LOL Champion List</b></h2>
	<hr>
	<script type="text/javascript">
                            function viewDetail(match) {
                                var con = document.getElementById(match);
                                if (con.style.display == 'none') {
                                    con.style.display = 'block';
                                } else {
                                    con.style.display = 'none';
                                }


                            }
                            
  function view(opt, champ) {
  	var con = document.getElementById(champ);
  if(opt) {
  	
     con.style.display = "block";
  }
  else {
     con.style.display = "none";
  }
}
                        </script>
	<div class='champSelect' >
		<div class='list' >
			<ul id='champListUL' style='width:700px; height:1720px; margin:auto; background-color: #000917; opacity:1; padding-left:50px; padding-right:50px; margin-top:10px;'><br>
				
				<?
				$cnt = 0;
				while ($row = mysqli_fetch_array($res)) {
					$cnt += 1;
					if($cnt % 10 == 1 and $cnt != 1) echo "<br><br><br><br><br><br>";
					
				echo "<li  style='display:block; float:left; width:64px; height:90px; margin-right:5px; color:white'>";
				echo "	<div class='champImage'>";
				echo "		<a href='javascript:(0)' onmouseover='view(true, \"{$row['champion']}\")' onmouseout='view(false,\"{$row['champion']}\")'>";
				echo "			<img src = '{$row['imgsrc']}' style='width:64px; height:64px;'>";
				echo "		</a>";
				echo "	</div>";
				echo "	<div class='champName' style='text-align:center; color:gray;'>";
				echo "		<nobr style='font-size:0.8em; text-align:center; width:60px;'>{$row['champion']}</nobr>";
				echo "	</div>";
				
				echo "	<div class='desc' id='{$row['champion']}' style=\"display: none; width:300px; z-index:1; background-color:black; position:relative; border:1px outset white; padding: 5px 5px 5px 5px;\">";
				echo "		<span>{$row['tmi']}</span>";
				echo "	</div>";
			
				echo "</li>";
				
				}
				?>
				
			</ul>
		</div>
	</div>
</div>
<?php include ("footer.php"); ?>