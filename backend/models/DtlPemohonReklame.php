<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dtl_pemohon_reklame".
 *
 * @property integer $id
 * @property integer $id_detail_pemohon
 * @property integer $ukuran1
 * @property string $satuan1
 * @property integer $ukuran2
 * @property string $satuan2
 * @property integer $sisi
 * @property string $nokartu
 */
class DtlPemohonReklame extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dtl_pemohon_reklame';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           [['id_detail_pemohon', 'ukuran1', 'satuan1', 'ukuran2', 'satuan2', 'sisi'], 'required'],
            [['id_detail_pemohon', 'ukuran1', 'ukuran2', 'sisi'], 'integer'],
            [['satuan1', 'satuan2','nokartu'], 'string', 'max' => 50],
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
            'ukuran1' => 'Ukuran1',
            'satuan1' => 'Satuan1',
            'ukuran2' => 'Ukuran2',
            'satuan2' => 'Satuan2',
            'sisi' => 'Sisi',
        ];
    }
}
