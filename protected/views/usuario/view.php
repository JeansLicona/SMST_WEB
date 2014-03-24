<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */

    $this->breadcrumbs = array(
        'Usuarios' => array('index'),
        $model->id_usuario,
    );

    $this->pageTitle = Yii::app()->name . ' - Ver Usuario';

    $this->menu = array(
        array(
            'label' => 'Usuario',
            'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
            'itemOptions ' => array('class' => 'dropdown'),
            'submenuOptions ' => array('class' => 'dropdown-menu'),
            'items' => array(
                array('label' => 'Registrar Usuario', 'url' => array('usuario/create')),
                array('label' => 'Editar Usuario', 'url' => array('update', 'id' => $model->id_usuario)),
                array('label' => 'Administrar Usuario', 'url' => array('admin')),
                array('label' => 'Búsqueda Avanzada Taxistas', 'url' => array('usuario/search')),
                array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
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
                array('label' => 'Administrar Reporte', 'url' => array('solicitud/admin')),
            )
        ),
    );
?>

<h1>Usuario <?php echo $model->nombre_usuario; ?></h1>

<?php
    $this->widget('zii.widgets.CDetailView', array(
        'data' => $model,
        'attributes' => array(
            'id_usuario',
            'nombre_usuario',
            'apellido_usuario',
            'username',
            'tipo_usuario',
        ),
    ));
?>
