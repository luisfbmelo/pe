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
			array('title, author, year, location, user_id, dateCreated, isNews', 'required'),
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
			'id_proj' => 'Id Proj',
			'title' => 'Title',
			'author' => 'Author',
			'year' => 'Year',
			'location' => 'Location',
			'user_id' => 'User',
			'desc' => 'Desc',
			'dateCreated' => 'Date Created',
			'isNews' => 'Is News',
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
     * Returns specifications
     * @param int proj_id with the project id
     * @return array with the specifications
     */
    public function getSpecifications($id)
    {
        $allData = Projects::model()->with('specs')->findByPK($id,array('order'=>'specName'));
        $thisSpecs = array();
        foreach ($allData->specs as $allSpec){
            array_push($thisSpecs,$allSpec['specName']);
        }
        return $thisSpecs;
    }

    protected function afterFind()
    {
        // convert to display format
        $this->dateCreated = strtotime($this->dateCreated);
        $this->dateCreated = date('j', $this->dateCreated).' de '.$this->monthConverter(date('n', $this->dateCreated)).' de '.date('Y', $this->dateCreated);

        parent::afterFind();
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
