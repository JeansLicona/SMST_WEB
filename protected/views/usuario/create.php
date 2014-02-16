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
            array('label' => 'Listar Usuarios', 'url' => array('index')),
            array('label' => 'Administrar Usuarios', 'url' => array('admin')),
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
            array('label' => 'Listar Taxistas', 'url' => array('taxista/index')),
            array('label' => 'Administrar Taxistas', 'url' => array('taxista/admin')),
        );
        ?>
        <h1>Registrar Taxista</h1>
    <?php } ?>
        
<?php $this->renderPartial('_form', array('model' => $model)); ?>