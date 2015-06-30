<?php

class ProjimgController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDelete(){
        if (isset($_POST['img']) && $_POST['img']!="" && is_numeric($_POST['img']) && isset($_POST['name']) && $_POST['name']!="" && isset($_POST['mod'])){
            Projimg::model()->deleteAllByAttributes(array(
                'id_image'=>$_POST['img'],
            ));

            unlink(Yii::getPathOfAlias('webroot').'/images/projects/'.$_POST['mod'].'/big/'.$_POST['name']);
            unlink(Yii::getPathOfAlias('webroot').'/images/projects/'.$_POST['mod'].'/news/'.$_POST['name']);
            unlink(Yii::getPathOfAlias('webroot').'/images/projects/'.$_POST['mod'].'/thumb/'.$_POST['name']);

            echo CJSON::encode("done");
        }else{
            echo CJSON::encode("error");
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}