<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_skpd".
 *
 * @property integer $id
 * @property integer $id_detail_pemohon
 * @property integer $id_kawasan
 * @property integer $id_sewa
 * @property string $npwp_d
 * @property integer $bunga
 * @property integer $kenaikan
 * @property integer $subtotal
 * @property integer $no_urut
 * @property integer $sisi
 * @property string $nokartu
 */
class TblSkpd extends \yii\db\ActiveRecord
{
    
    public $nama;
        public  $nama_kawasan;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_skpd';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detail_pemohon', 'id_kawasan', 'id_sewa', 'bunga', 'kenaikan', 'subtotal', 'no_urut', 'sisi','kali'], 'integer'],
            [['npwp_d','nokartu'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_detail_pemohon' => 'Id Detail Pemohon',
            'id_kawasan' => 'Id Kawasan',
            'id_sewa' => 'Id Sewa',
            'npwp_d' => 'Npwp D',
            'bunga' => 'Bunga',
            'kenaikan' => 'Kenaikan',
            'subtotal' => 'Subtotal',
            'no_urut' => 'No Urut',
            'sisi' => 'Sisi',
        ];
    }
}
