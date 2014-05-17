<h1> Reporte Global del Sistema</h1>
<table>
	<tr>
		<th>id</th>
		<th>fk_taxista</th>
		<th>fk usuario</th>
		<th>latitud</th>
		<th>longitud</th>
		<th>estado</th>
		<th>costo</th>
		<th>hora fecha</th>
	</tr>
<?php
	foreach( $models as $model ){
		echo '<tr>';

		foreach( $model as $attribute )
			echo '<td>'. $attribute .'</td>';

		echo '</tr>';
	}
?>
</table>