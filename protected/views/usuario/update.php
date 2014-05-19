<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id_usuario=>array('view','id'=>$model->id_usuario),
	'Editar',
);
$this->pageTitle=Yii::app()->name.' - Editar Usuarios';
$this->menu = array(
            array(
                'label' => 'Usuario',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Usuario', 'url' => array('usuario/create')),
                    array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->id_usuario)),
                    array('label' => 'Administrar Usuario', 'url' => array('admin')),
                    array('label' => 'Búsqueda Avanzada Taxistas', 'url' => array('usuario/search')),
                    array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
                    array('label'=>'Localizar Taxistas', 'url'=>array('taxista/locate')),
                )
            ),
            array(
                'label' => 'Equipo',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Equipo', 'url' => array('equipo/create')),
                    array('label' => 'Administrar Equipo', 'url' => array('equipo/admin')),
                )
            ),
            array(
                'label' => 'Reporte',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => ' Reporte Global Sistema', 'url' => array('solicitud/admin')),
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
                )
            ),
        );
?>

<h1>Edici&oacute;n de Usuario <?php echo $model->id_usuario; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>