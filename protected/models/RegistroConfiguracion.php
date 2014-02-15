<?php

/**
 * This is the model class for table "registro_configuracion".
 *
 * The followings are the available columns in table 'registro_configuracion':
 * @property integer $id_registro
 * @property integer $fk_usuario
 * @property string $fecha_hora_registro
 * @property string $configuracion_cambiada
 * @property double $valor_viejo
 * @property double $valor_nuevo
 *
 * The followings are the available model relations:
 * @property Usuario $fkUsuario
 */
class RegistroConfiguracion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'registro_configuracion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_usuario, fecha_hora_registro, configuracion_cambiada, valor_viejo, valor_nuevo', 'required'),
			array('fk_usuario', 'numerical', 'integerOnly'=>true),
			array('valor_viejo, valor_nuevo', 'numerical'),
			array('configuracion_cambiada', 'length', 'max'=>75),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_registro, fk_usuario, fecha_hora_registro, configuracion_cambiada, valor_viejo, valor_nuevo', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'fkUsuario' => array(self::BELONGS_TO, 'Usuario', 'fk_usuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_registro' => 'Id Registro',
			'fk_usuario' => 'Fk Usuario',
			'fecha_hora_registro' => 'Fecha Hora Registro',
			'configuracion_cambiada' => 'Configuracion Cambiada',
			'valor_viejo' => 'Valor Viejo',
			'valor_nuevo' => 'Valor Nuevo',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_registro',$this->id_registro);
		$criteria->compare('fk_usuario',$this->fk_usuario);
		$criteria->compare('fecha_hora_registro',$this->fecha_hora_registro,true);
		$criteria->compare('configuracion_cambiada',$this->configuracion_cambiada,true);
		$criteria->compare('valor_viejo',$this->valor_viejo);
		$criteria->compare('valor_nuevo',$this->valor_nuevo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RegistroConfiguracion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
