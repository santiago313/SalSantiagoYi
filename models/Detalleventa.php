<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "detalleventa".
 *
 * @property int $iddetalleventa
 * @property int $ventas_idventas
 * @property int $vendedores_idvendedores
 * @property string|null $observaciones
 *
 * @property Vendedores $vendedoresIdvendedores
 * @property Ventas $ventasIdventas
 */
class Detalleventa extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detalleventa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['observaciones'], 'default', 'value' => null],
            [['ventas_idventas', 'vendedores_idvendedores'], 'required'],
            [['ventas_idventas', 'vendedores_idvendedores'], 'integer'],
            [['observaciones'], 'string'],
            [['vendedores_idvendedores'], 'exist', 'skipOnError' => true, 'targetClass' => Vendedores::class, 'targetAttribute' => ['vendedores_idvendedores' => 'idvendedores']],
            [['ventas_idventas'], 'exist', 'skipOnError' => true, 'targetClass' => Ventas::class, 'targetAttribute' => ['ventas_idventas' => 'idventas']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'iddetalleventa' => Yii::t('app', 'Iddetalleventa'),
            'ventas_idventas' => Yii::t('app', 'Ventas '),
            'vendedores_idvendedores' => Yii::t('app', 'Vendedores '),
            'observaciones' => Yii::t('app', 'Observaciones'),
        ];
    }

    /**
     * Gets query for [[VendedoresIdvendedores]].
     *
     * @return \yii\db\ActiveQuery|VendedoresQuery
     */
    public function getVendedoresIdvendedores()
    {
        return $this->hasOne(Vendedores::class, ['idvendedores' => 'vendedores_idvendedores']);
    }

    /**
     * Gets query for [[VentasIdventas]].
     *
     * @return \yii\db\ActiveQuery|VentasQuery
     */
    public function getVentasIdventas()
    {
        return $this->hasOne(Ventas::class, ['idventas' => 'ventas_idventas']);
    }

    /**
     * {@inheritdoc}
     * @return DetalleventaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DetalleventaQuery(get_called_class());
    }

}
