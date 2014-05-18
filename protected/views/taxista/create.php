<?php
/* @var $this TaxistaController */
/* @var $model Taxista */

$this->pageTitle=Yii::app()->name.' - Registrar Taxista';
$this->breadcrumbs=array(
	'Taxistas'=>array('index'),
	'Registrar',
);

$this->menu = array(
        array(
        'label' => 'Taxista',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Búsqueda Avanzada', 'url'=>array('usuario/search')),
        array('label'=>'Administrar Taxistas', 'url'=>array('admin')),
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
?>

<h1>Registrar Taxista</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>