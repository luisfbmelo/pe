<?php

/**
 * This is the model class for table "consulting".
 *
 * The followings are the available columns in table 'consulting':
 * @property integer $id_con
 * @property string $title
 * @property string $author
 * @property string $desc
 * @property string $location
 * @property string $year
 * @property string $dateCreated
 * @property integer $user_id
 * @property integer $isNews
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Consulting extends CActiveRecord
{

    public $dateNormal;

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'consulting';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, author, desc, location, year', 'required'),
            array('user_id, isNews, type', 'numerical', 'integerOnly'=>true),
            array('title, author, location', 'length', 'max'=>255),
            array('year', 'length', 'max'=>45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_con, title, author, desc, location, year, dateCreated, user_id, isNews, type', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id_con' => 'Nº',
            'title' => 'Projeto',
            'author' => 'Consultadoria',
            'desc' => 'Descrição',
            'location' => 'Local',
            'year' => 'Ano',
            'dateCreated' => 'Data de criação',
            'user_id' => 'User',
            'isNews' => 'Destaque',
            'type' => 'Type',
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

        $criteria->compare('id_con',$this->id_con);
        $criteria->compare('title',$this->title,true);
        $criteria->compare('author',$this->author,true);
        $criteria->compare('desc',$this->desc,true);
        $criteria->compare('location',$this->location,true);
        $criteria->compare('year',$this->year,true);
        $criteria->compare('dateCreated',$this->dateCreated,true);
        $criteria->compare('user_id',$this->user_id);
        $criteria->compare('isNews',$this->isNews);
        $criteria->compare('type',$this->type);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Consulting the static model class
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
        $this->type = 3;

        return parent::beforeSave();
    }

    /**
     * Returns primary key after saving
     * @return mixed
     */
    protected function afterSave()
    {

        $this->id_con = $this->getPrimaryKey();
        return parent::afterSave();
    }

    protected function afterFind()
    {
        // convert to display format
        $this->dateNormal = $this->dateCreated;
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
