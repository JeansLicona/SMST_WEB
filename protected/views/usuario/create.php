<?php
    /* @var $this UsuarioController */
    /* @var $model Usuario */
    if (Yii::app()->user->id == 'administrador') {
        $this->breadcrumbs = array(
            'Usuarios' => array('index'),
            'Crear',
        );

        $this->pageTitle = Yii::app()->name . ' - Registrar Usuario';

        $this->menu = array(
            array(
                'label' => 'Usuario',
                'linkOptions ' => array('encode' => false, 'class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'),
                'itemOptions ' => array('class' => 'dropdown'),
                'submenuOptions ' => array('class' => 'dropdown-menu'),
                'items' => array(
                    array('label' => 'Registrar Usuario', 'url' => array('usuario/create')),
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
                    array('label' => ' Reporte Global Sistema', 'url' => array('solicitud/admin')),
                )
            ),
        );
 ?>

        <h1>Registrar Usuario</h1>
        <?php
    } else {
        $this->breadcrumbs = array(
            'Taxista' => array('taxista/index'),
            'Crear',
        );

        $this->pageTitle = Yii::app()->name . ' - Registrar Taxista';

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
    );
        ?>
        <h1>Registrar Taxista</h1>
    <?php } ?>

<?php $this->renderPartial('_form', array('model' => $model)); ?>