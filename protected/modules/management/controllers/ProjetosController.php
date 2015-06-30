<?php

class ProjetosController extends Controller
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
				'actions'=>array('index','delete'),
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
		$model=new Projects;
        $modelImg = new Projimg;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if (isset($_POST['cancelar'])){
            $this->redirect(array('index'));
        }else if(isset($_POST['Projects']))
		{
            $hasErrors = false;
			$model->attributes=$_POST['Projects'];

            //Photos
            $photos = CUploadedFile::getInstancesByName('imagens');

            $photosResult = $modelImg->checkImages($photos);

            //specs
            if (isset($_POST['Projects']['specs'])){
                $totalSpecs = $_POST['Projects']['specs'];
            }


            if($model->validate()){

                    if ($photosResult!=1){
                        foreach($photosResult as $errors){
                            $model->addError('imagens', $errors);
                        }
                        $hasErrors=true;
                    }
                    if (!isset($totalSpecs[0]) || $totalSpecs[0]=="" || count($totalSpecs)==0){
                        $model->addError('specs', 'Selecione pelo menos uma especialidade');
                        $hasErrors=true;
                    }


                    if (!$hasErrors){
                        $model->save();
                        $specsModel = new Projspec;
                        foreach($totalSpecs as $specs){
                            $specsModel->spec_id=NULL;
                            $specsModel->isNewRecord=TRUE;
                            $specsModel->proj_id = $model->getPrimaryKey();
                            $specsModel->spec_id = $specs;
                            $specsModel->save();

                        }
                        $modelImg->saveImages($photos,$model->getPrimaryKey());

                        //$this->redirect(array('view','id'=>$model->id_proj));
                        Yii::app()->user->setFlash('addedProj','Projeto adicionado com sucesso.');
                        $this->redirect(array('index'));
                    }

            }else{
                if ($photosResult!=1){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                }
                if (!isset($totalSpecs[0]) || $totalSpecs[0]=="" || count($totalSpecs)==0){
                    $model->addError('specs', 'Selecione pelo menos uma especialidade');
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
        $modelImg = new Projimg;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['cancelar'])){
            $this->redirect(array('index'));
        }else if(isset($_POST['Projects']))
        {
            $hasErrors = false;
            $model->attributes=$_POST['Projects'];

            //Photos
            $photos = CUploadedFile::getInstancesByName('imagens');

            $photosResult = $modelImg->checkImages($photos);

            //specs
            if (isset($_POST['Projects']['specs'])){
                $totalSpecs = $_POST['Projects']['specs'];
            }

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
                if (!isset($totalSpecs[0]) || $totalSpecs[0]=="" || count($totalSpecs)==0){
                    $model->addError('specs', 'Selecione pelo menos uma especialidade');
                    $hasErrors=true;
                }

                if (!$hasErrors){
                    $model->save();
                    //delete all to reset
                    $criteria = new CDbCriteria;
                    $criteria->condition='proj_id='.$id;
                    Projspec::model()->deleteAll($criteria);


                    //save specs
                    $specsModel = new Projspec;
                    foreach($totalSpecs as $specs){
                        $specsModel->spec_id=NULL;
                        $specsModel->isNewRecord=TRUE;
                        $specsModel->proj_id = $model->getPrimaryKey();
                        $specsModel->spec_id = $specs;
                        $specsModel->save();

                    }

                    //saveimages
                    $modelImg->saveImages($photos,$model->getPrimaryKey());

                    //remove images
                    if ($totalImagesDelete!=0){
                        Projimg::model()->deleteAllByAttributes(array(
                            'id_image'=>$totalImagesDelete,
                        ));
                    }

                    //$this->redirect(array('view','id'=>$model->id_proj));
                    Yii::app()->user->setFlash('updatedProj','Projeto atualizado com sucesso.');
                    $this->redirect(array('index'));
                }

            }else{
                if ($photosResult!=1 && $totalImagesOld==0){
                    foreach($photosResult as $errors){
                        $model->addError('imagens', $errors);
                    }
                }
                if (!isset($totalSpecs[0]) || $totalSpecs[0]=="" || count($totalSpecs)==0){
                    $model->addError('specs', 'Selecione pelo menos uma especialidade');
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



            //removes all specs associated
            Projspec::model()->deleteAllByAttributes(array(
                'proj_id'=>$listarray,
            ));

            //removes all images associated
            Projimg::model()->deleteAllByAttributes(array(
                'proj_id'=>$listarray,
            ));

            //removes all folders
            foreach($listarray as $item){
                $model=$this->loadModel($item);

                if (file_exists(Yii::getPathOfAlias('webroot').'/images/projects/'.$model->id_proj)) {
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$model->id_proj.'/big');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$model->id_proj.'/news');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$model->id_proj.'/thumb');
                    $model->delete_directory(Yii::getPathOfAlias('webroot').'/images/projects/'.$model->id_proj);
                }
            }

            //removes all projects
            Projects::model()->deleteAllByAttributes(array(
                'id_proj'=>$listarray,
            ));

            echo CJSON::encode("done");

            //$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }else{
            $this->loadModel($id)->delete();

            Yii::app()->user->setFlash('deleteProj','Fiscalização eliminada com sucesso.');

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
		$dataProvider=new CActiveDataProvider('Projects',array(
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
		$model=new Projects('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Projects']))
			$model->attributes=$_GET['Projects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Projects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Projects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Projects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


}
