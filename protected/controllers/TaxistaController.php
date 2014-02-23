<?php

    class TaxistaController extends Controller {

        /**
         * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
         * using two-column layout. See 'protected/views/layouts/column2.php'.
         */
        public $layout = '//layouts/column2';

        /**
         * @return array action filters
         */
        public function filters() {
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
        public function accessRules() {
            return array(
                array('allow', // allow all users to perform 'index' and 'view' actions
                    'actions' => array('index', 'view', 'search', 'create', 'update', 'admin', 'delete', 'reporte'),
                    'users' => array('administrador', 'operador'),
                ),
//            array('allow', // allow authenticated user to perform 'create' and 'update' actions
//                'actions' => array('create', 'update'),
//                'users' => array('@'),
//            ),
//            array('allow', // allow admin user to perform 'admin' and 'delete' actions
//                'actions' => array('admin', 'delete'),
//                'users' => array('admin'),
//            ),
                array('deny', // deny all users
                    'users' => array('*'),
                ),
            );
        }

        /**
         * Displays a particular model.
         * @param integer $id the ID of the model to be displayed
         */
        public function actionView($id) {
            $this->render('view', array(
                'model' => $this->loadModel($id),
            ));
        }

        /**
         * Creates a new model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         */
        public function actionCreate() {
            $model = new Taxista;
            $idTaxista = $_GET['id'];
            $activo = $_GET['activo'];
            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);
            $model->id_taxista = $idTaxista;
            $model->activo = $activo;
            if (isset($_POST['Taxista'])) {
                $model->attributes = $_POST['Taxista'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id_taxista));
            }

            $this->render('create', array(
                'model' => $model,
            ));
        }

        public function actionReporte() {
            $model = new Taxista;
            $reporteSolicitudes="";
            if (isset($_POST['Taxista'])) {
                $modelTaxista = $_POST['Taxista'];
                if (!empty($modelTaxista->fecha_inicio_reporte) && !empty($modelTaxista->fecha_fin_reporte)) {
                    $reporteSolicitudes=$this->generarReporte($modelTaxista);
                }
            }
            $this->render('reporte', array(
                'model' => $model ,'reporte'=>$reporteSolicitudes));
        }

        /**
         * Updates a particular model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id the ID of the model to be updated
         */
        public function actionUpdate($id) {
            $model = $this->loadModel($id);

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            if (isset($_POST['Taxista'])) {
                $model->attributes = $_POST['Taxista'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->id_taxista));
            }

            $this->render('update', array(
                'model' => $model,
            ));
        }

        public function actionSearch() {
            $model = new Taxista('search');
            $model->unsetAttributes();
            if (isset($_GET['Taxista']))
                $model->attributes = $_GET['Taxista'];
            $this->render('_search', array(
                'model' => $model,
            ));
        }

        /**
         * Deletes a particular model.
         * If deletion is successful, the browser will be redirected to the 'admin' page.
         * @param integer $id the ID of the model to be deleted
         */
        public function actionDelete($id) {
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }

        /**
         * Lists all models.
         */
        public function actionIndex() {
            $dataProvider = new CActiveDataProvider('Taxista');
            $this->render('index', array(
                'dataProvider' => $dataProvider,
            ));
        }

        /**
         * Manages all models.
         */
        public function actionAdmin() {
            $model = new Taxista('search');
            $model->unsetAttributes();  // clear any default values
            if (isset($_GET['Taxista']))
                $model->attributes = $_GET['Taxista'];

            $this->render('admin', array(
                'model' => $model,
            ));
        }

        /**
         * Returns the data model based on the primary key given in the GET variable.
         * If the data model is not found, an HTTP exception will be raised.
         * @param integer $id the ID of the model to be loaded
         * @return Taxista the loaded model
         * @throws CHttpException
         */
        public function loadModel($id) {
            $model = Taxista::model()->findByPk($id);
            if ($model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
            return $model;
        }

        /**
         * Performs the AJAX validation.
         * @param Taxista $model the model to be validated
         */
        protected function performAjaxValidation($model) {
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'taxista-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

        private function generarReporte($modelTaxista) {
            $query = new CDbCriteria();
            $query->select = "*";
            $query->condition = "hora_fecha_solicitud between '".$modelTaxista->fecha_inicio_reporte."' 
                and '".$modelTaxista->fecha_fin_reporte."'  and fk_taxista = '". $modelTaxista->id_taxista."'
                     and estado_solicitud = 'aprobada'";
            
            $solicitudes=  Solicitud::model()->findAll($query);
            $montoTotal=0;
            $tablaSolicitudes = '';
            $tablaSolicitudes.= '<table border="2" width="80%">';
            $tablaSolicitudes.='<tr>';
            $tablaSolicitudes.='<th>Latidud Solicitud</th>';
            $tablaSolicitudes.='<th>Longitud Solicitud</th>';
            $tablaSolicitudes.='<th>Hora y Fecha Solicitud</th>';
            $tablaSolicitudes.='<th>Monto</th>';
            $tablaSolicitudes.='</tr>';
            foreach ($solicitudes as $solicitud) {
                $tablaSolicitudes.='<tr align="center">';
                $tablaSolicitudes.='<td>' . $solicitud->latitud_solicitud . '</td>';
                $tablaSolicitudes.='<td>' . $solicitud->longitud_solicitud . '</td>';
                $tablaSolicitudes.='<td>' . $solicitud->hora_fecha_solicitud . '</td>';
                $tablaSolicitudes.='<td>' . $solicitud->costo_solcitud . '</td>';
                $tablaSolicitudes.='</tr>';
                $montoTotal=$montoTotal+$solicitud->costo_solcitud;
            }
            $tablaSolicitudes.='<tr align="center">';
                $tablaSolicitudes.='<td></td>';
                $tablaSolicitudes.='<td></td>';
                $tablaSolicitudes.='<td>Monto Total</td>';
                $tablaSolicitudes.='<td>' .$montoTotal. '</td>';
                $tablaSolicitudes.='</tr>';
            $tablaSolicitudes.= '</table>';
            return $tablaSolicitudes;
        }

    }

    