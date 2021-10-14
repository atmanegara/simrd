<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblBiaya;

/**
 * TblBiayaSearch represents the model behind the search form about `backend\models\TblBiaya`.
 */
class TblBiayaSearch extends TblBiaya
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_detail_pemohon', 'jumlah', 'harga'], 'integer'],
            [['satuan'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TblBiaya::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_detail_pemohon' => $this->id_detail_pemohon,
            'jumlah' => $this->jumlah,
            'harga' => $this->harga,
        ]);

        $query->andFilterWhere(['like', 'satuan', $this->satuan]);

        return $dataProvider;
    }
}
