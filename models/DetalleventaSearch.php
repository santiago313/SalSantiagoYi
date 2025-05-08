<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Detalleventa;

/**
 * DetalleventaSearch represents the model behind the search form of `app\models\Detalleventa`.
 */
class DetalleventaSearch extends Detalleventa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['iddetalleventa', 'ventas_idventas', 'vendedores_idvendedores'], 'integer'],
            [['observaciones'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     * @param string|null $formName Form name to be used into `->load()` method.
     *
     * @return ActiveDataProvider
     */
    public function search($params, $formName = null)
    {
        $query = Detalleventa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params, $formName);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'iddetalleventa' => $this->iddetalleventa,
            'ventas_idventas' => $this->ventas_idventas,
            'vendedores_idvendedores' => $this->vendedores_idvendedores,
        ]);

        $query->andFilterWhere(['like', 'observaciones', $this->observaciones]);

        return $dataProvider;
    }
}
