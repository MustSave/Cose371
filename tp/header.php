<!DOCTYPE html>
<html lang='ko'>
<head>
    <title>LOL-info</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css?after">
    
</head>
<body>
<form action="player_form.php" method="post">
    <div class='navbar fixed'>
        <div class='container'>
            <a class='pull-left title' href="index.php">LOL-DB</a>
            <ul class='pull-right'>
                <li>
                    <input type="text" name="search_keyword" placeholder="소환사명 , 팀 검색">
                </li>
                <li><a href='player_form.php'>선수 관리</a></li>
                <li><a href='add_player.php'>선수 추가</a></li>
                <li><a href='championship_form.php'>경기 관리</a></li>
                <li><a href='champ.php'>챔피언 소개</a></li>
                <!--<li><a href='site_info.php'>소개</a></li>-->
            </ul>
        </div>
    </div>
</form>