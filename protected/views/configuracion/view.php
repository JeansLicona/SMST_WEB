<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
    'Configuraciones'
);
$this->pageTitle = Yii::app()->name . ' - Ver Configuración';
$this->menu = array(
        array(
        'label' => 'Taxista',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Búsqueda Avanzada', 'url'=>array('usuario/search')),
        array('label'=>'Administrar Taxistas', 'url'=>array('taxista/admin')),
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
        ) ),
        array(
        'label' => 'Reporte',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            array('label'=>' Reporte Global Sistema', 'url'=>array('solicitud/admin')),
        ) ),
        array(
        'label' => 'Configuraciones',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
            array( 'label'=>'Actualizar configuraciones', 'url'=>array('/configuracion/update/1') ),
        )),
    );
?>

<h1>Configuraciones</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data'=>$model,
    'attributes'=>array(
        array(
            'label' => 'Costo por Solicitud',
            'value'=>'$' . $model->costo_solicitud
        ),
        'frecuencia_balance_taxista',
    ),
)); ?>
