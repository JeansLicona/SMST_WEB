
<?php

    function crearCorreos() {
        conectaBD();
        $query = "SELECT id_taxista FROM taxista";
        $busqueda = mysql_query($query);
        if (mysql_num_rows($busqueda) >= 1) {
            while ($taxista = mysql_fetch_array($busqueda)) {
                $IDtaxista = $taxista['id_taxista'];
                $email = $taxista['email'];
                $mensaje = estructurarMensajeCorreo($IDtaxista);
                enviarCorreo($mensaje, $email);
            }
        }
    }

    function estructurarMensajeCorreo($IDtaxista) {
        conectaBD();
        $mensaje = "";
        $query = "SELECT latitud_solicitud,longitud_solicitud,hora_fecha_solicitud,costo_solicitud FROM solicitud WHERE fk_taxista=" . $IDtaxista;
        $busqueda = mysql_query($query);
        if (mysql_num_rows($busqueda) >= 1) {
            $mensaje.='<table  class="tabla">
            <tr>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Fecha y Hora de Solicitud</th>
                <th>Monto</th>
            </tr>';
            while ($estadoCuenta = mysql_fetch_array($busqueda)) {
                $mensaje.='<tr>
                <td>' . $estadoCuenta['latitud_solicitud'] . '</td>
                <td>' . $estadoCuenta['longitud_solicitud'] . '</td>
                <td>' . $estadoCuenta['hora_fecha_solicitud'] . '</td>
                 <td>' . $estadoCuenta['costo_solicitud'] . '</td>
            </tr>';
            }
            $mensaje.='</table>';
        } else {
            $mensaje.="No cuenta con ninguna solicitud atendida";
        }
        return $mensaje;
    }

    function enviarCorreo($mensaje, $email) {
        $objMensaje = Array(
            'para' => $email,
            'cuerpo' => $mensaje,
            'asunto' => 'Estado de Cuenta'
        );
        if (mail($objMensaje['para'], $objMensaje['asunto'], $objMensaje['cuerpo'])) {
            echo 'El mensaje se envi&oacute; correctamente!';
        } else {
            echo 'El mensaje no fue enviado!';
        }
    }

?>