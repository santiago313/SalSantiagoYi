<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ventas".
 *
 * @property int $idventas
 * @property int $clientes_idclientes
 * @property int $vehiculos_idvehiculos
 * @property string|null $fechaventa
 * @property float|null $total
 *
 * @property Clientes $clientesIdclientes
 * @property Detalleventa[] $detalleventas
 * @property Vehiculos $vehiculosIdvehiculos
 */
class Ventas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ventas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fechaventa', 'total'], 'default', 'value' => null],
            [['clientes_idclientes', 'vehiculos_idvehiculos'], 'required'],
            [['clientes_idclientes', 'vehiculos_idvehiculos'], 'integer'],
            [['fechaventa'], 'safe'],
            [['total'], 'number'],
            [['clientes_idclientes'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::class, 'targetAttribute' => ['clientes_idclientes' => 'idclientes']],
            [['vehiculos_idvehiculos'], 'exist', 'skipOnError' => true, 'targetClass' => Vehiculos::class, 'targetAttribute' => ['vehiculos_idvehiculos' => 'idvehiculos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idventas' => Yii::t('app', 'Idventas'),
            'clientes_idclientes' => Yii::t('app', 'Clientes'),
            'vehiculos_idvehiculos' => Yii::t('app', 'Vehiculos'),
            'fechaventa' => Yii::t('app', 'Fecha de Venta'),
            'total' => Yii::t('app', 'Total'),
        ];
    }

    /**
     * Gets query for [[ClientesIdclientes]].
     *
     * @return \yii\db\ActiveQuery|ClientesQuery
     */
    public function getClientesIdclientes()
    {
        return $this->hasOne(Clientes::class, ['idclientes' => 'clientes_idclientes']);
    }

    /**
     * Gets query for [[Detalleventas]].
     *
     * @return \yii\db\ActiveQuery|DetalleventaQuery
     */
    public function getDetalleventas()
    {
        return $this->hasMany(Detalleventa::class, ['ventas_idventas' => 'idventas']);
    }

    /**
     * Gets query for [[VehiculosIdvehiculos]].
     *
     * @return \yii\db\ActiveQuery|VehiculosQuery
     */
    public function getVehiculosIdvehiculos()
    {
        return $this->hasOne(Vehiculos::class, ['idvehiculos' => 'vehiculos_idvehiculos']);
    }

    /**
     * {@inheritdoc}
     * @return VentasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VentasQuery(get_called_class());
    }

}
