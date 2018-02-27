<html>
<link rel="shortcut icon" href="favicon.ico" />
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Sakura Frontier</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=0.2, maximum-scale=1">
    <link rel="stylesheet" href="./Sakura Frontier_files/bootstrap.min.css">
    <script src="./Sakura Frontier_files/jquery.min.js.download"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="navbar navbar-inverse navbar-fixedtop">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 clana text-left align-middle">Sakura Frontier</div>
                <div class="col-xs-3 switch text-right align-middle">
                    <button class="btn-sm btn-danger" onclick="stats()" style="color:beige"> Switch Stats </button>
                </div>
                <div class="col-xs-3 golem text-right"><img class="logo" src="nav.png"></div>
            </div>
        </div>
    </div>
    <table class="container stato">
        <thead>
            <tr>
                <th>
                    <h1 onclick="sortMem()">Member</h1></th>
                <th>
                    <h1 onclick="sortRan()"><center>Rank</center></h1></th>
                <th>
                    <h1 onclick="sortChe()"><center>CChest</center></h1></th>
                <th>
                    <h1 onclick="sortDon()"><center>Donations</center></h1></th>
                <th>
                    <h1 onclick="sortTro()"><center>Trophies</center></h1></th>
                <th>
                    <h1 onclick="sortImp()"><center>Importance</center></h1></th>
            </tr>
        </thead>
        <tbody class="switcho">
            
            <?php
			
            $db = new SQLite3('sakura.db');
                
            $results = $db->query('SELECT * FROM player ORDER BY troph DESC');
            while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                echo '<tr class="clickable-row" data-href="https://spy.deckshop.pro/player/'.str_replace('#','',$row['tag']).'">';
                echo '<td>'.decode($row['name']).'</td>';
                echo '<td><center>';
                if($row['role']>.6) echo '<ooy><small>Leader</small></ooy>';
                elseif($row['role']>.5) echo '<hoy><small>Elder</small></hoy>';
                else echo '<small>Member</small>';
                echo '</center></td>';
                echo '<td><center>'.round($row['chest']).'</center></td>';
                echo '<td><center><ooy>'.round($row['dona']).'</ooy><span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>'.round($row['rece']).'</center></td>';
                echo '<td><center><ooy>'.round($row['contr']).'</ooy><span>&nbsp;&nbsp;/&nbsp;&nbsp;</span>'.round($row['troph']).'</center></td>';
                if ($row['vip']==-1) echo '<td><center>new</center></td>';
                else echo '<td><center>'.round($row['vip']*100).'<ooy>%</ooy></center></td>';
                echo '</tr>';
            }
			
			function decode($payload) {
				return array_pop(json_decode('["'.$payload.'"]'));
			}
			
			?>
            
        </tbody>
    </table>
</body>
<script>
    var yo = 0;

    function sortMem() {
        $('.switcho').load('mem.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortChe() {
        $('.switcho').load('che.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortTro() {
        $('.switcho').load('tro.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortDon() {
        $('.switcho').load('don.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortImp() {
        $('.switcho').load('imp.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }
    
    function sortRan() {
        $('.switcho').load('ran.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function stats() {
        if (yo == 0) {
            $('.stato').load('actio.php',
            function () {
                $(".clickable-row").click(function () {
                window.location = $(this).data("href");});
            });
            yo = 1;
        } else {
            $('.stato').load('stato.php',
            function () {
                $(".clickable-row").click(function () {
                window.location = $(this).data("href");});
            });
            yo = 0;
        }
    }

    function sortMem2() {
        $('.switcho').load('mem2.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortLC() {
        $('.switcho').load('lc.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortSMC() {
        $('.switcho').load('smc.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortImp2() {
        $('.switcho').load('imp2.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }

    function sortActi() {
        $('.switcho').load('acti.php',
        function () {
            $(".clickable-row").click(function () {
            window.location = $(this).data("href");});
        });
    }
    
    jQuery(document).ready(function ($) {
        $(".clickable-row").click(function () {
            window.location = $(this).data("href");
        });
    });
</script>

</html>