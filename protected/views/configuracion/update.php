<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
    'Configuraciones'=>array('view','id'=>$model->id_conf),
    'Actualizar',
);
$this->pageTitle = Yii::app()->name . ' - Actualizar Configuración';
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
                array('label'=>'Localizar Taxistas', 'url'=>array('taxista/locate')),
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
        ) ),
    );
?>

<h1>Actualizar Configuraciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>