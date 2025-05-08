<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Vendedores]].
 *
 * @see Vendedores
 */
class VendedoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Vendedores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Vendedores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
