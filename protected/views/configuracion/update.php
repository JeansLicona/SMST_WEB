<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
    'Configuraciones'=>array('view','id'=>$model->id_conf),
    'Actualizar',
);

$this->menu=array(
    array('label'=>'Ver Configuraciones',
        'url'=>array('view', 'id'=>$model->id_conf)),
);
?>

<h1>Actualizar Configuraciones</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>