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
			array('author, year, location, dateCreated, isNews, user_id', 'required'),
			array('isNews, user_id', 'numerical', 'integerOnly'=>true),
			array('author, location', 'length', 'max'=>255),
			array('year', 'length', 'max'=>45),
			array('desc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sup, author, year, location, desc, dateCreated, isNews, user_id', 'safe', 'on'=>'search'),
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
			'id_sup' => 'Id Sup',
			'author' => 'Author',
			'year' => 'Year',
			'location' => 'Location',
			'desc' => 'Desc',
			'dateCreated' => 'Date Created',
			'isNews' => 'Is News',
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

    protected function afterFind()
    {
        // convert to display format
        $this->dateCreated = strtotime($this->dateCreated);
        $this->dateCreated = date('N', $this->dateCreated).' de '.$this->monthConverter(date('n', $this->dateCreated)).' de '.date('Y', $this->dateCreated);

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
