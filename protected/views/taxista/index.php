<?php
/* @var $this TaxistaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Taxistas',
);

$this->pageTitle=Yii::app()->name.' - Taxistas';
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

<h1>Taxistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
