<?php

class FiscalizacoesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $model=new Supervision;
        $modelImg = new Supimg;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['cancelar'])){
            $this->redirect(array('index'));
        }else if(isset($_POST['Supervision']))
        {
            $hasErrors = false;
            $model->attributes=$_POST['Supervision'];

            //Photos
            $photos = CUploadedFile::getInstancesByName('imagens');

            $photosResult = $modelImg->checkImages($photos);



            if($model->validate()){

                if ($photosResult!=1){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                    $hasErrors=true;
                }


                if (!$hasErrors){
                    $model->save();
                    $modelImg->saveImages($photos,$model->getPrimaryKey());

                    //$this->redirect(array('view','id'=>$model->id_proj));
                    Yii::app()->user->setFlash('addedSup','Fiscalização adicionada com sucesso.');
                    $this->redirect(array('index'));
                }

            }else{
                if ($photosResult!=1){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                }
            }
        }

        $this->render('create',array(
            'model'=>$model,
        ));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
        $model=$this->loadModel($id);
        $modelImg = new Supimg();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['cancelar'])){
            $this->redirect(array('index'));
        }else if(isset($_POST['Supervision']))
        {
            $hasErrors = false;
            $model->attributes=$_POST['Supervision'];

            //Photos
            $photos = CUploadedFile::getInstancesByName('imagens');

            $photosResult = $modelImg->checkImages($photos);

            //images to delete
            if (isset($_POST['total'])){
                $totalImagesDelete = $_POST['total'];
            }else{
                $totalImagesDelete=0;
            }

            //images to keep
            if (isset($_POST['oldSet'])){
                $totalImagesOld = $_POST['oldSet'];
            }else{
                $totalImagesOld=0;
            }


            if($model->validate()){

                if ($photosResult!=1 && $totalImagesOld==0){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                    $hasErrors=true;
                }

                if (!$hasErrors){
                    $model->save();

                    //saveimages
                    $modelImg->saveImages($photos,$model->getPrimaryKey());

                    //remove images
                    if ($totalImagesDelete!=0){
                        Supimg::model()->deleteAllByAttributes(array(
                            'id_image'=>$totalImagesDelete,
                        ));
                    }

                    //$this->redirect(array('view','id'=>$model->id_proj));
                    Yii::app()->user->setFlash('updatedSup','Fiscalização atualizada com sucesso.');
                    $this->redirect(array('index'));
                }

            }else{
                if ($photosResult!=1 && $totalImagesOld==0){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                }
            }
        }

        $this->render('update',array(
            'model'=>$model,
        ));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id=null)
	{
        if (isset($_POST['list']) && $_POST['list']!=""){
            $listarray = $_POST['list'];

            //removes all images associated
            Supimg::model()->deleteAllByAttributes(array(
                'sup_id'=>$listarray,
            ));

            //removes all folders
            foreach($listarray as $item){
                $model=$this->loadModel($item);

                if (file_exists(Yii::getPathOfAlias('webroot').'/images/supervision/'.$model->id_sup)) {
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$model->id_sup.'/big');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$model->id_sup.'/news');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$model->id_sup.'/thumb');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/supervision/'.$model->id_sup);
                }
            }

            //removes all projects
            Supervision::model()->deleteAllByAttributes(array(
                'id_sup'=>$listarray,
            ));

            echo CJSON::encode("done");

            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }else{
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash('deleteSup','Fiscalização eliminada com sucesso.');

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Supervision',array(
            'sort' => array(
                'defaultOrder' => 'dateCreated DESC',
            ),
            'pagination'=>array(
                'pageSize'=> 15
            ),
        ));
        $this->render('index',array(
            'dataProvider'=>$dataProvider,
        ));
	}

	/**
	 * Manages all models.
	 */
	/*public function actionAdmin()
	{
		$model=new Supervision('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Supervision']))
			$model->attributes=$_GET['Supervision'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Supervision the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Supervision::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Supervision $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='supervision')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
