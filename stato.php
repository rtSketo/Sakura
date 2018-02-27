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

$results = $db->query('SELECT * FROM player');
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