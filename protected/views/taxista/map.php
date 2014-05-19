<?php
    /* @var $this TaxistaController */
    /* @var $model Taxista */

    $this->breadcrumbs = array(
        'Taxistas' => array('index'),
        'Administrar',
    );
    $this->pageTitle = Yii::app()->name . ' - Administrar Taxista';
    $this->menu = array(
        array(
        'label' => 'Taxista',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Búsqueda Avanzada Taxista', 'url'=>array('usuario/search')),
            )
        ),
        array(
        'label' => 'Equipo',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Equipo', 'url'=>array('equipo/create')),
	array('label'=>'Administrar Equipo', 'url'=>array('equipo/admin')),

            )
        ),
        array(
        'label' => 'Reporte',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>' Reporte Global Sistema', 'url'=>array('solicitud/admin')),
            )
        ),
        array(
        'label' => 'Configuraciones',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            array( 'label'=>'Ver configuraciones', 'url'=>array('/configuracion/1') ),
            array( 'label'=>'Actualizar configuraciones', 'url'=>array('/configuracion/update/1') )
        ) ),
    );

    Yii::app()->getClientScript()->registerScriptFile(
        'http://maps.googleapis.com/maps/api/js?key=AIzaSyCWpKb8p-jRibF9v7veONs8108kj32ntW8&sensor=false',
        CClientScript::POS_HEAD
    );

    foreach ($data as $coordinate) { $gmpas_markers .= '
        var marker'.$coordinate['id_taxista'].' = new google.maps.Marker({
            position: new google.maps.LatLng('.$coordinate['latitud'].', '.$coordinate['longitud'].'),
            map: map,
            title:"'.$coordinate['id_taxista'].'"
        });
    '; }

    Yii::app()->getClientScript()->registerScript( 'gmaps-ini', '
        var mapOptions = {
            center: new google.maps.LatLng(20.9660441, -89.627433),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map( document.getElementById("map_canvas"), mapOptions );
        '. $gmpas_markers .'
    ', CClientScript::POS_READY);

?>

<div id="map_canvas" style="width:100%; height:480px"></div>

