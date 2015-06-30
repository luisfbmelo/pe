<?php

/**
 * This is the model class for table "supervision".
 *
 * The followings are the available columns in table 'supervision':
 * @property integer $id_sup
 * @property string $author
 * @property string $year
 * @property string $location
 * @property string $desc
 * @property string $dateCreated
 * @property integer $isNews
 * @property integer $user_id
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Supimg[] $supimgs
 */
class Supervision extends CActiveRecord
{

    public $dateNormal;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supervision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, year, location, isNews', 'required'),
            array('user_id, isNews', 'numerical', 'integerOnly'=>true),
            array('title, author, location', 'length', 'max'=>255),
            array('year', 'length', 'max'=>45),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sup, title, author, year, location, desc, dateCreated, isNews, user_id', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'supimgs' => array(self::HAS_MANY, 'Supimg', 'sup_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sup' => 'Nº',
            'title' => 'Projeto',
			'author' => 'Fiscalização',
			'year' => 'Ano',
			'location' => 'Local',
			'desc' => 'Descrição',
			'dateCreated' => 'Data de Criação',
			'isNews' => 'Destaque',
			'user_id' => 'User',
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

		$criteria->compare('id_sup',$this->id_sup);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('isNews',$this->isNews);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Supervision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    /**
     * Sets date to push to database
     * @return mixed
     */
    public function beforeSave() {
        if ($this->isNewRecord){
            $this->dateCreated = new CDbExpression('NOW()');
        }else{
            $this->dateCreated=$this->dateNormal;
        }
        $this->user_id = 1;
        $this->type = 2;
        $this->author = "PE - Projetos de Engenharia";

        return parent::beforeSave();
    }

    /**
     * Returns primary key after saving
     * @return mixed
     */
    protected function afterSave()
    {

        $this->id_sup = $this->getPrimaryKey();
        return parent::afterSave();
    }

    /**
     * Removes all associated
     * @return mixed
     */
    public function beforeDelete(){

        Supimg::model()->deleteAllByAttributes(array(
            'sup_id'=>$this->id_sup,
        ));

        if (file_exists(Yii::getPathOfAlias('webroot').'/images/supervision/'.$this->id_sup)) {
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$this->id_sup.'/big');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$this->id_sup.'/news');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$this->id_sup.'/thumb');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$this->id_sup);
        }

        return parent::beforeDelete();
    }

    /**
     * Removes folders
     */
    public function afterDelete(){

        return parent::afterDelete();
    }

    protected function afterFind()
    {
        // convert to display format
        $this->dateNormal = $this->dateCreated;
        $this->dateCreated = strtotime($this->dateCreated);
        $this->dateCreated = date('N', $this->dateCreated).' de '.$this->monthConverter(date('n', $this->dateCreated)).' de '.date('Y', $this->dateCreated);

        parent::afterFind();
    }

    /**
     * Removes all directories
     * @param $dir
     */
    function delete_directory($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    delete_directory($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
    }

    public function monthConverter($month)
    {
        switch($month){
            case 1:
                return 'Janeiro';
                break;
            case 2:
                return 'Fevereiro';
                break;
            case 3:
                return 'Março';
                break;
            case 4:
                return 'Abril';
                break;
            case 5:
                return 'Maio';
                break;
            case 6:
                return 'Junho';
                break;
            case 7:
                return 'Julho';
                break;
            case 8:
                return 'Agosto';
                break;
            case 9:
                return 'Setembro';
                break;
            case 10:
                return 'Outubro';
                break;
            case 11:
                return 'Novembro';
                break;
            case 12:
                return 'Dezembro';
                break;
        }
    }
}
