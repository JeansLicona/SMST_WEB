<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $id_solicitud
 * @property integer $fk_taxista
 * @property integer $fk_usuario
 * @property string $latitud_solicitud
 * @property string $longitud_solicitud
 * @property string $estado_solicitud
 * @property string $hora_fecha_solicitud
 * @property double $costo_solcitud
 *
 * The followings are the available model relations:
 * @property Error[] $errores
 * @property Taxista $taxista
 * @property Usuario $usuario
 */
class Solicitud extends CActiveRecord
{
	/**
	 * Estados válidos de la solicitud
	 */
	public static $estados = array( 0=>'NUEVA', 1=>'ACEPTADA', 2=>'COMPLETA', 3=>'CANCELADA' );

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('fk_taxista, fk_usuario, latitud_solicitud, longitud_solicitud, estado_solicitud, hora_fecha_solicitud, costo_solcitud', 'required'),
			array('fk_taxista, fk_usuario', 'numerical', 'integerOnly'=>true),
			array('costo_solcitud', 'numerical'),
			array('latitud_solicitud, longitud_solicitud', 'length', 'max'=>20),
			array('estado_solicitud', 'length', 'max'=>10),

			array('id_solicitud, fk_taxista, fk_usuario, latitud_solicitud, longitud_solicitud, estado_solicitud, hora_fecha_solicitud, costo_solcitud', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		return array(
			'errores' => array(self::HAS_MANY, 'Error', 'fk_solicitud'),
			'taxista' => array(self::BELONGS_TO, 'Taxista', 'fk_taxista'),
			'cliente' => array(self::BELONGS_TO, 'Usuario', 'fk_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_solicitud' => 'Id Solicitud',
			'fk_taxista' => 'Taxista',
			'fk_usuario' => 'Usuario',
			'latitud_solicitud' => 'Latitud',
			'longitud_solicitud' => 'Longitud',
			'estado_solicitud' => 'Estado',
			'hora_fecha_solicitud' => 'Fecha',
			'costo_solcitud' => 'Costo',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->with = array(
			'taxista.idTaxista',
			'cliente',
		);
		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('latitud_solicitud',$this->latitud_solicitud,true);
		$criteria->compare('longitud_solicitud',$this->longitud_solicitud,true);
		$criteria->compare('estado_solicitud',$this->estado_solicitud,true);
		$criteria->compare('hora_fecha_solicitud',$this->hora_fecha_solicitud,true);
		$criteria->compare('costo_solcitud',$this->costo_solcitud);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public static function getEstadoName( $key ){
		return self::$estados[$key];
	}

	public static function getEstadosList(){
		return self::$estados;
	}
}
