<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_sewa".
 *
 * @property integer $id
 * @property integer $id_jenis_reklame
 * @property string $satuan
 * @property integer $harga_dasar
 * @property string $masa_pajak
 */
class TblSewa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_sewa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_jenis_reklame', 'harga_dasar'], 'integer'],
            [['satuan', 'masa_pajak'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_jenis_reklame' => 'Id Jenis Reklame',
            'satuan' => 'Satuan',
            'harga_dasar' => 'Harga Dasar',
            'masa_pajak' => 'Masa Pajak',
        ];
    }
    public static function getSewa(){
        $data = TblSewa::findAll(['id_jenis_reklame'=>1]);
        return \yii\helpers\ArrayHelper::map($data, 'id', 'masa_pajak');
    }
}
