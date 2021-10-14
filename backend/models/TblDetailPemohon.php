<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "tbl_detail_pemohon".
 *
 * @property integer $id
 * @property integer $id_pemohon
 * @property integer $id_reklame
 * @property double $ukuran1
 * @property string $satuan1
 * @property double $ukuran2
 * @property string $satuan2
 * @property integer $banyak
 * @property integer $nokartu_old
 * @property string $waktu_mulai
 * @property string $waktu_akhir
 * @property string $lokasi
 * @property string $teks
 * @property integer $status
 * @property string $status_reklame
 */
class TblDetailPemohon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public $nama_pemohon;
    public $nama_reklame;
    public $jabatan_pemohon;
    public $alamat_pemohon;
    public $nik_npwp;
    public $jenis_reklame;
    public $imageFile;
  //  public $nokartu;
    
    public $nama_kawasan;
    public $npwp_d;
    public $bunga;
    public $kenaikan;
    public $subtotal;
    public $path_gambar;
    
    public $setuju;
    public $sisi;
    public $jenis;
    
    public static function tableName()
    {
        return 'tbl_detail_pemohon';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
     //      [['imageFile'], 'safe'],
              [['imageFile'], 'file','skipOnEmpty'=>true, 'extensions' => 'pdf,png,jpg','maxFiles' => 4],
            [['id_pemohon', 'id_reklame', 'banyak'], 'integer'],
//            [['ukuran1', 'ukuran2'], 'number'],
            [['lokasi', 'teks','id_reklame','waktu_mulai', 'waktu_akhir'],'required','message'=>'Kolom ini tidak boleh kosong'],
            [['waktu_mulai', 'waktu_akhir'], 'safe'],
            [['status_reklame','nama_reklame','nama_pemohon','jabatan_pemohon','alamat_pemohon','nik_npwp','nokartu'], 'string'],
           // [['nik_npwp'],'unique','message'=>'sama uy'],
            [['lokasi','nokartu','nokartu_old', 'teks'], 'string', 'max' => 350],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pemohon' => 'Id Pemohon',
            'id_reklame' => 'Id Reklame',
            'ukuran1' => 'Ukuran1',
            'satuan1' => 'Satuan1',
            'ukuran2' => 'Ukuran2',
            'satuan2' => 'Satuan2',
            'banyak' => 'Banyak',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_akhir' => 'Waktu Akhir',
            'lokasi' => 'Lokasi',
            'teks' => 'Teks',
            'path_gambar' => 'Path Gambar',
            'status' => 'Status',
            'status_reklame' => 'Status Reklame',
            'sisi' => 'Sisi',
            'setuju'=>'Data yang saya isi benar'
        ];
    }
    public static function getAllTulisan(){
      $sql ="select A.id as id_dtl_pemohon, B.id,B.nama, A.teks,C.nokartu from tbl_detail_pemohon A
inner join tbl_pemohon B on A.id_pemohon = B.id 
inner join tbl_registrasi C on A.nokartu = C.nokartu
";
        $data =  Yii::$app->db->createCommand($sql)->queryAll(); //TblDetailPemohon::find()->all();
        return \yii\helpers\ArrayHelper::map($data, 'nokartu', 'nokartu');
    }
    
    public function upload()
    {
      if ($this->validate()) {    
          $this->imageFile->saveAs($_SERVER['DOCUMENT_ROOT'].'/simrd/uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension); 
          return true;      
          } else {
          return false;    
          }  
    }
    
    public static function ketstatus($status)
    {
                        switch ($status){
                    case '0':
                        $status = 'Permohonan Pengajuan Dibatal';
                        break;
                    case '1':
                        $status = 'Proses pengajuan Permohonan';
                        break;
                    case '2':
                        $status = 'Pengajuan Permohonan Disetujui';
break;                
                }
                        return '<span class="label label-info">' . $status . '</span>';
    }
    public static function ketstatusreklame($status_reklame)
    {
        switch ($status_reklame){
        case '0':
            $status_reklame = 'Berhenti';
            break;
        case '1':
            $status_reklame = 'Baru';
            break;
        case '2':
            $status_reklame = 'perpanjang';
            break;
        
    }
    return '<span class="label label-warning">'.$status_reklame . '</span>';
    }
}
