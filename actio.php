<thead>
    <tr>
        <th>
            <h1 onclick="sortMem2()">Member</h1></th>
        <th>
            <h1 onclick="sortLC()"><center>LC</center></h1></th>
        <th>
            <h1 onclick="sortSMC()"><center>SMC</center></h1></th>
        <th>
            <h1 onclick="sortImp2()"><center>Importance</center></h1></th>
        <th>
            <h1 onclick="sortActi()"><center>Activity</center></h1></th>
    </tr>
</thead>
<tbody class="switcho">
    <?php
$db = new SQLite3('sakura.db');

$results = $db->query('SELECT name, lege, smc, acti, vip, chest.tag FROM chest, player WHERE chest.tag = player.tag AND isin = 1 ORDER BY acti DESC');
while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
    echo '<tr class="clickable-row" data-href="https://spy.deckshop.pro/player/'.str_replace('#','',$row['tag']).'">';
    echo '<td>'.decode($row['name']).'</td>';
	echo '<td><center><ooy>+</ooy>'.$row['lege'].'</center></td>';
	echo '<td><center><ooy>+</ooy>'.$row['smc'].'</center></td>';
    if ($row['vip']==-1) 
        echo '<td><center>new</center></td>';
    else
        echo '<td><center>'.round($row['vip']*100).'<ooy>%</ooy></center></td>';
    echo '<td><center>'.round($row['acti']*100).'<ooy>%</ooy></center></td>';
    echo '</tr>';
}
			
			function decode($payload) {
				return array_pop(json_decode('["'.$payload.'"]'));
			}
			
			?>
</tbody>