<?php include ("header.php"); ?>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="http://rochestb.github.io/jQuery.YoutubeBackground/src/jquery.youtubebackground.js"></script>
    <div id="video" class="background-video"></div>
    <script>
        $('#video').YTPlayer({
            fitToBackground: true,
            videoId: 't-7xAlSHa7g'
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
    <div class='container'>
    	<h1>LOL-DB</h1>
        <p align="center"><img src="Teemo.jpg" width="70%"></p>
        
        <p class="ref">본 사이트에서 사용된 리소스는 학술적 용도로만 사용되었으며, 상업적 사용은 제한됩니다. <br />
        배경 youtube <a href = "https://www.youtube.com/watch?v=t-7xAlSHa7g"> 영상</a> 및 배너 <a href="http://gameinfo.leagueoflegends.co.kr/ko/game-info/champions/teemo/"> 이미지</a>의 모든 권리는 League of Legends에 있으며  
        youtube background player의 모든 권리는 <a href="https://github.com/rochestb/jQuery.YoutubeBackground">rochestb</a>에 있습니다.</p>
    </div>
<?php include ("footer.php"); ?>