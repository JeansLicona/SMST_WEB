<?php
/* @var $this EquipoController */
/* @var $model Equipo */

$this->breadcrumbs=array(
	'Equipos'=>array('index'),
	$model->id_equipo=>array('view','id'=>$model->id_equipo),
	'Editar',
);
$this->pageTitle=Yii::app()->name.' - Actualizar Equipo';

$this->menu = array(
        array(
        'label' => 'Taxista',
        'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
        'itemOptions ' => array('class' => 'dropdown'),
        'submenuOptions ' => array('class' => 'dropdown-menu'),
        'items' => array(
        array('label'=>'Registrar Taxista', 'url'=>array('usuario/create')),
	array('label'=>'Búsqueda Avanzada Taxistas', 'url'=>array('usuario/search')),
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
        array('label'=>'Ver Equipo', 'url'=>array('view', 'id'=>$model->id_equipo)),
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

<h1>Editar Equipo <?php echo $model->id_equipo; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>