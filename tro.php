<?php
$db = new SQLite3('sakura.db');

$results = $db->query('SELECT * FROM player ORDER BY isin DESC, contr DESC');
            while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
                echo '<tr class="clickable-row ';
                if($row['isin']==0) echo 'deleted';
                echo '" data-href="https://spy.deckshop.pro/player/'.str_replace('#','',$row['tag']).'">';
                echo '<td>'.decode($row['name']).'</td>'; 
                echo '<td><center>';
                if($row['role']>.75) echo '<ooy><small>Leader</small></ooy>';
                elseif($row['role']>.55) echo '<hoy><small>Elder</small></hoy>';
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