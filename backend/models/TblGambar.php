<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tbl_gambar".
 *
 * @property integer $id
 * @property integer $nokartu
 * @property string $path_gambar
 */
class TblGambar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
  
    public static function tableName()
    {
        return 'tbl_gambar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
         //   [['id'], 'required'],
          //  [['id', 'nokartu'], 'integer'],
            [['path_gambar','nokartu'], 'string', 'max' => 160],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nokartu' => 'Id Detail Pemohon',
            'path_gambar' => 'Path Gambar',
        ];
    }
}
