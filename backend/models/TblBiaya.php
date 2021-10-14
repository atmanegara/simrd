<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_biaya".
 *
 * @property integer $id
 * @property integer $id_detail_pemohon
 * @property integer $jumlah
 * @property integer $harga
 * @property string $satuan
 */
class TblBiaya extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_biaya';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_detail_pemohon', 'jumlah', 'harga'], 'integer'],
            [['satuan'], 'string', 'max' => 50],
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
            'jumlah' => 'Jumlah',
            'harga' => 'Harga',
            'satuan' => 'Satuan',
        ];
    }
}
