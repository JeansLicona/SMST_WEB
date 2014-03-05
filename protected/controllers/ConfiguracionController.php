<?php

class ConfiguracionController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to
     * '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            array('allow',
                'actions'=>array('create','update'),
                'users'=>array('@'),
            ),
            array('allow',
                'actions'=>array('admin','delete'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view'
     * page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['Configuracion']))
        {
            $model->attributes=$_POST['Configuracion'];
            if($model->save())
            {
                $this->action_write_cron_job( $model->frecuencia_balance_taxista );
                $this->action_exec_cron_command();
                $this->redirect(array('view','id'=>$model->id_conf));
            }

        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Configuracion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=Configuracion::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Configuracion $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='configuracion-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    private function action_write_cron_job($days = 20)
    {
        $jobPath = Yii::getPathOfAlias(
                ConfiguracionController::webroot_directory
            ) . ConfiguracionController::relative_job_path;

        $command = "MAILTO=" .Yii::app()->params['adminEmail'].
        "\n* * */$days * * /usr/bin/php $jobPath";

        $file = Yii::getPathOfAlias(
                ConfiguracionController::webroot_directory
            ) . ConfiguracionController::relative_cron_command;


        file_put_contents($file, $command);
    }

    private function action_exec_cron_command()
    {
        $job = Yii::getPathOfAlias(
            ConfiguracionController::webroot_directory
        ) . ConfiguracionController::relative_cron_command;

        exec( ConfiguracionController::remove_cron_jobs_command );
        exec( ConfiguracionController::add_crontab_job . $job);
    }

    const relative_job_path = '/cron/envio_correo_taxistas/EnvioCorreo.php';
    const relative_cron_command = '/cron/envio_correo_taxistas/cron_job.txt';
    const webroot_directory = 'webroot';
    const remove_cron_jobs_command = 'crontab -r';
    const add_crontab_job = 'crontab ';
}
