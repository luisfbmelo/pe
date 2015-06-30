<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id_proj
 * @property string $title
 * @property string $author
 * @property string $year
 * @property string $location
 * @property integer $user_id
 * @property string $desc
 * @property string $dateCreated
 * @property integer $isNews
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Projimg[] $projimgs
 * @property Spec[] $specs
 */
class Projects extends CActiveRecord
{

    public $specsIds = array();
    public $dateNormal;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, author, year, location, isNews', 'required'),
			array('user_id, isNews', 'numerical', 'integerOnly'=>true),
			array('title, author, location', 'length', 'max'=>255),
			array('year', 'length', 'max'=>45),
			array('desc', 'safe'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_proj, title, author, year, location, user_id, desc, dateCreated, isNews', 'safe', 'on'=>'search'),
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
			'projimgs' => array(self::HAS_MANY, 'Projimg', 'proj_id'),
			'specs' => array(self::MANY_MANY, 'Spec', 'projspec(proj_id, spec_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_proj' => 'Nº',
			'title' => 'Projeto',
			'author' => 'Arquitetura',
			'year' => 'Ano',
			'location' => 'Local',
			'user_id' => 'User',
			'desc' => 'Descrição',
			'dateCreated' => 'Data de criação',
			'isNews' => 'Destaque',
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

		$criteria->compare('id_proj',$this->id_proj);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('dateCreated',$this->dateCreated,true);
		$criteria->compare('isNews',$this->isNews);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort' => array(
                'defaultOrder' => 'id_proj DESC',
            ),
            'pagination'=>array(
                'pageSize'=> 20
            ),

		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
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
        $this->type = 1;

        return parent::beforeSave();
    }

    /**
     * Returns primary key after saving
     * @return mixed
     */
    protected function afterSave()
    {

        $this->id_proj = $this->getPrimaryKey();
        return parent::afterSave();
    }

    /**
     * Removes all associated
     * @return mixed
     */
    public function beforeDelete(){
        Projspec::model()->deleteAllByAttributes(array(
            'proj_id'=>$this->id_proj,
        ));

        Projimg::model()->deleteAllByAttributes(array(
            'proj_id'=>$this->id_proj,
        ));

        if (file_exists(Yii::getPathOfAlias('webroot').'/images/projects/'.$this->id_proj)) {
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$this->id_proj.'/big');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$this->id_proj.'/news');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$this->id_proj.'/thumb');
            $this->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$this->id_proj);
        }

        return parent::beforeDelete();
    }

    /**
     * Removes folders
     */
    public function afterDelete(){

        return parent::afterDelete();
    }

    /**
     * Converts date after find
     */
    protected function afterFind()
    {
        // convert to display format
        $this->dateNormal = $this->dateCreated;
        $this->dateCreated = strtotime($this->dateCreated);
        $this->dateCreated = date('j', $this->dateCreated).' de '.$this->monthConverter(date('n', $this->dateCreated)).' de '.date('Y', $this->dateCreated);

        foreach ($this->specs as $spec){
            array_push($this->specsIds,$spec['id_spec']);
        }

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

    /**
     * Converts month number to text
     * @param $month
     * @return string
     */
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
