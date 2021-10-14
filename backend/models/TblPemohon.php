<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_pemohon".
 *
 * @property integer $id
 * @property string $nik_npwp
 * @property string $nama
 * @property string $jabatan
 * @property string $alamat
 */
class TblPemohon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_pemohon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nik_npwp', 'jabatan'], 'string', 'max' => 50],
            [['nama','nope'], 'string', 'max' => 70],
            [['alamat'], 'string', 'max' => 350],
            [['nik_npwp','nope','nama','alamat'], 'required','message'=>'Data Ini Wajib Di isi'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nik_npwp' => 'Nik Npwp',
            'nama' => 'Nama',
            'jabatan' => 'Jabatan',
            'alamat' => 'Alamat',
        ];
    }
    public static function getAllPemohon()
    {
        $data = TblPemohon::find()->all();
        
        return \yii\helpers\ArrayHelper::map($data, 'id', 'nik_npwp');
    }
    public static function getPemohon()
    {
        $data = TblPemohon::find()->all();
        return $data;
    }
}
