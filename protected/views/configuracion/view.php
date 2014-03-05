<?php
/* @var $this ConfiguracionController */
/* @var $model Configuracion */

$this->breadcrumbs=array(
    'Configuraciones'
);

$this->menu=array(
    array('label'=>'Actualizar Configuraciones',
        'url'=>array('update', 'id'=>$model->id_conf)),
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
