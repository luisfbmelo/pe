<?php

/**
 * This is the model class for table "supimg".
 *
 * The followings are the available columns in table 'supimg':
 * @property integer $id_image
 * @property string $imgName
 * @property integer $sup_id
 *
 * The followings are the available model relations:
 * @property Supervision $sup
 */
class Supimg extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supimg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imgName, sup_id', 'required'),
			array('sup_id', 'numerical', 'integerOnly'=>true),
			array('imgName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_image, imgName, sup_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'sup' => array(self::BELONGS_TO, 'Supervision', 'sup_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_image' => 'Id Image',
			'imgName' => 'Img Name',
			'sup_id' => 'Sup',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_image',$this->id_image);
		$criteria->compare('imgName',$this->imgName,true);
		$criteria->compare('sup_id',$this->sup_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supimg the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Checks all images for errors
     * @param $imgPac
     * @return array|bool
     */
    public function checkImages($imgPac){
        if (isset($imgPac) && count($imgPac) > 0) {
            $errors = array();
            $extensions = array("JPG","JPEG","PNG","jpg","jpeg","png");
            foreach ($imgPac as $images => $pic){
                $picName = $pic->name;

                //CHECK EXTENSION
                if(in_array($pic->extensionName,$extensions ) === false){
                    $errors[]="O ficheiro \"".$picName."\" não possui uma extensão válida.";
                    $errorStatus=true;
                }else{
                    //check image dimensions
                    list($width, $height, $type, $attr) = getimagesize($pic->tempName);
                    if ($width!=940 && $height!=515){
                        $errors[]="O ficheiro  \"".$picName."\" possui uma dimensão diferente de 914x515px.";
                        $errorStatus=true;
                    }
                }

                //CHECK IMAGE SIZE
                if($pic->size> 8097152){
                    $errors[]="O ficheiro  \"".$picName."\" possui um tamanho superior a 8MB.";
                    $errorStatus=true;
                }

                /*echo $pic->name.'<br />';
                echo $pic->extensionName.'<br />';
                echo $pic->size.'<br />';*/

            }

        }else{
            $errors[]='Selecione uma imagem';
            $errorStatus=true;
        }

        if (count($errors)>0){
            return $errors;
        }else{
            return true;
        }
    }

    public function saveImages($allImg,$target){
        if (isset($allImg) && count($allImg) > 0) {
            $curModel = $this;

            if (!file_exists(Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/big')) {
                mkdir(Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/big', 0777, true);
                mkdir(Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/news', 0777, true);
                mkdir(Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/thumb', 0777, true);
            }

            // go through each uploaded image
            $count=0;
            foreach ($allImg as $image => $pic) {
                $new_image_name = 'image_' . date('Y-m-d-H-i-s') . '_' . $count;
                $newCoded = md5($new_image_name);
                $finalName = $newCoded.'.'.$pic->extensionName;
                if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/big/'.$finalName)) {

                    // add it to the main model now
                    $curModel->imgName = $finalName;
                    $curModel->sup_id = $target;
                    $curModel->id_image=NULL;
                    $curModel->isNewRecord=TRUE;

                    //create thumb
                    $originPath=Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/big/';
                    $pathNews=Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/news/';
                    $pathThumb=Yii::getPathOfAlias('webroot').'/images/supervision/'.$target.'/thumb/';

                    //see what king of process it's needed
                    if ($pic->extensionName=="jpg" || $pic->extensionName=="jpeg") {
                        $imgt = "imagejpeg";
                        $imgcreatefrom = "imagecreatefromjpeg";
                    }else if ($pic->extensionName == "png") {
                        $imgt = "imagepng";
                        $imgcreatefrom = "imagecreatefrompng";
                    }else{
                        $imgt = "imagegif";
                        $imgcreatefrom = "imagecreatefromgif";
                    }

                    //origin photo
                    $nova_foto = $imgcreatefrom($originPath.$finalName);

                    //get dimensions
                    $largura = imagesx($nova_foto);
                    $altura = imagesy($nova_foto);

                    //relação entre largura e altura da foto carregada
                    $proporcao = $largura/$altura;

                    //determinar dimensões do thumbnail e news
                    $largura_news = 940;
                    $altura_news = 390;
                    $largura_thumb = 300;
                    $altura_thumb = 300;

                    //set ancor point
                    // calculating the part of the image to use for thumbnail
                    if ($largura > $altura) {
                        $y = 0;
                        $x = ($largura - $altura) / 2;
                        $smallestSide = $altura;
                    } else {
                        $x = 0;
                        $y = ($altura - $largura) / 2;
                        $smallestSide = $largura;
                    }


                    /*THUMBNAIL*/
                    //criar nova imagem fotográfica para o news
                    $news_foto = imagecreatetruecolor($largura_news,$altura_news);
                    imagecopyresized ($news_foto, $nova_foto, 0, 0, 0, 0, $largura_news, $altura_news, $smallestSide, $smallestSide);

                    //criar nova imagem fotográfica para o thumbnail
                    $thumb_foto = imagecreatetruecolor($largura_thumb,$altura_thumb);
                    imagecopyresized ($thumb_foto, $nova_foto, 0, 0, $x, $y, $largura_thumb, $altura_thumb, $smallestSide, $smallestSide);

                    //gravar o ficheiro jpg com o thumbnail
                    if ($imgt=="imagepng"){

                        //news
                        $white = imagecolorallocate($news_foto, 255, 255, 255);
                        imagefill($news_foto, 0, 0, $white);

                        //thumb
                        $white = imagecolorallocate($thumb_foto, 255, 255, 255);
                        imagefill($thumb_foto, 0, 0, $white);

                        $imgt($news_foto, $pathNews.$finalName, 0);
                        $imgt($thumb_foto, $pathThumb.$finalName, 0);
                    }else if ($imgt=="imagejpg"){
                        $imgt($news_foto, $pathNews.$finalName, 100);
                        $imgt($thumb_foto, $pathThumb.$finalName, 100);
                    }else{
                        $imgt($news_foto, $pathNews.$finalName);
                        $imgt($thumb_foto, $pathThumb.$finalName);
                    }

                    $curModel->save(); // DONE

                }

                $count++;

            }

        }
    }
}
