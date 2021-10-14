<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblSkpd;

/**
 * TblSkpdSearch represents the model behind the search form about `backend\models\TblSkpd`.
 */
class TblSkpdSearch extends TblSkpd
{

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_detail_pemohon', 'id_kawasan', 'id_sewa', 'bunga', 'kenaikan', 'subtotal', 'no_urut', 'sisi'], 'integer'],
            [['nama','nama_kawasan'],'string'],
            [['npwp_d'], 'safe'],
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
        $query = TblSkpd::find()
                ->select('tbl_skpd.*,tbl_pemohon.nik_npwp,tbl_pemohon.nama as nama_pemohon,tbl_kawasan.nama as nama_kawasan')
                ->innerJoin('tbl_detail_pemohon', 'tbl_skpd.id_detail_pemohon=tbl_detail_pemohon.id')
                ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
                ->innerJoin('tbl_kawasan','tbl_skpd.id_kawasan=tbl_kawasan.id')
               ->leftJoin('tbl_registrasi','tbl_registrasi.nokartu=tbl_detail_pemohon.nokartu');

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
//        $query->andFilterWhere([
//            'concat_ws("",nama,nik_npwp,nokartu)tbl_skpd.id' => $this->id,
//            'tbl_skpd.id_detail_pemohon' => $this->id_detail_pemohon,
//            'tbl_pemohon.nama' => $this->nama,
//            'tbl_skpd.id_kawasan' => $this->id_kawasan,
//            'tbl_kawasan.nama_kawasan' => $this->nama_kawasan,
//            'tbl_skpd.id_sewa' => $this->id_sewa,
//            'tbl_skpd.bunga' => $this->bunga,
//            'tbl_skpd.kenaikan' => $this->kenaikan,
//            'tbl_skpd.subtotal' => $this->subtotal,
//            'tbl_skpd.no_urut' => $this->no_urut,
//            'tbl_skpd.sisi' => $this->sisi,
 //       ]);

       $query->andFilterWhere(['like', 'concat_ws("",tbl_pemohon.nama,tbl_registrasi.nokartu,tbl_pemohon.nik_npwp)', $this->nama]);

        return $dataProvider;
    }
}
