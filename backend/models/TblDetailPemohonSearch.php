<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TblDetailPemohon;

/**
 * TblDetailPemohonSearch represents the model behind the search form about `backend\models\TblDetailPemohon`.
 */
class TblDetailPemohonSearch extends TblDetailPemohon
{
    public $nama_pemohon;
    public $jenis;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pemohon', 'id_reklame', 'banyak', 'status'], 'integer'],
//            [['ukuran1', 'ukuran2'], 'number'],
            [['nama_pemohon','jenis'],'string'],
            [['satuan1', 'satuan2', 'waktu_mulai', 'waktu_akhir', 'lokasi', 'teks', 'path_gambar', 'status_reklame'], 'safe'],
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
        $query = TblDetailPemohon::find()
                ->select('tbl_detail_pemohon.*,tbl_pemohon.nik_npwp,tbl_pemohon.nama,tbl_jenis_reklame.jenis as nama_reklame, '
                        . 'tbl_registrasi.tglreg,'
                        . 'dtl_pemohon_reklame.ukuran1 as ukuran1_reklame,dtl_pemohon_reklame.satuan1 as satuan1_reklame,
						dtl_pemohon_reklame.ukuran2 ukuran2_reklame,dtl_pemohon_reklame.satuan2 satuan2_reklame,
						dtl_pemohon_reklame.sisi sisi_reklame')
                ->innerJoin('tbl_pemohon','tbl_detail_pemohon.id_pemohon=tbl_pemohon.id')
                ->innerJoin('tbl_jenis_reklame','tbl_detail_pemohon.id_reklame=tbl_jenis_reklame.id')
                ->innerJoin('tbl_registrasi','tbl_detail_pemohon.nokartu=tbl_registrasi.nokartu')
                ->innerJoin('dtl_pemohon_reklame','tbl_detail_pemohon.id=dtl_pemohon_reklame.id_detail_pemohon')
                ->groupBy('tbl_detail_pemohon.nokartu');
        
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
//            'tbl_detail_pemohon.id' => $this->id,
//            'tbl_pemohon.nama' => $this->nama_pemohon,
//            'tbl_detail_pemohon.id_pemohon' => $this->id_pemohon,
//            'tbl_detail_pemohon.id_reklame' => $this->id_reklame,
//            'tbl_detail_pemohon.ukuran1' => $this->ukuran1,
//            'tbl_detail_pemohon.ukuran2' => $this->ukuran2,
//            'tbl_detail_pemohon.banyak' => $this->banyak,
//            'tbl_detail_pemohon.waktu_mulai' => $this->waktu_mulai,
//            'tbl_detail_pemohon.waktu_akhir' => $this->waktu_akhir,
//            'tbl_detail_pemohon.status' => $this->status,
//        ]);

        $query->andFilterWhere(['like', 'concat_ws("",tbl_pemohon.nama,tbl_pemohon.nik_npwp,tbl_detail_pemohon.nokartu)', $this->nama_pemohon]);
//            ->andFilterWhere(['like', 'satuan2', $this->satuan2])
//            ->andFilterWhere(['like', 'lokasi', $this->lokasi])
//            ->andFilterWhere(['like', 'teks', $this->teks])
//            ->andFilterWhere(['like', 'path_gambar', $this->path_gambar])
//            ->andFilterWhere(['like', 'status_reklame', $this->status_reklame]);

        return $dataProvider;
    }
}
