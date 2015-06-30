<?php

class ProjetosController extends Controller
{

	public function actionIndex()
	{
        Yii::app()->params['pageType'] = 'global';

        //if session var not created
        if (!isset(Yii::app()->session['projTotal'])){
            Yii::app()->session['projTotal'] = 6;
        }

        //read if given offset
        if (isset($_POST['offset']) && is_numeric($_POST['offset'])){
            $offset=(int)$_POST['offset'];
        }else{
            $offset = 0;
        }

        //read if given total items
        if (isset($_POST['total']) && is_numeric($_POST['total'])){
            $totalGet=(int)$_POST['total'];
        }else{
            //print total according to history
            $totalGet = Yii::app()->session['projTotal'];
        }

        //query criterias
        $findCriteria = new CDbCriteria();
        $findCriteria->offset = $offset;
        $findCriteria->limit = $totalGet;
        $findCriteria->condition = 'isNews=0';
        $findCriteria->order = 'year DESC, dateCreated DESC';
        $projects = Projects::model()->findAll($findCriteria);

        //is ajax request
        if(Yii::app()->request->isAjaxRequest) {

            //if no more results
            if (count($projects)==0){
                $result = 'endData';
            }else{

                //increment next total
                Yii::app()->session['projTotal']+=count($projects);

                //print partial
                $result = $this->renderPartial('_list',array('todos'=>$projects),true);
            }

            echo CJSON::encode($result);
        //is not ajax request
        } else {
            if (count($projects)==0){
                $projects='noData';
            }
            $this->render('index',array('todos'=>$projects));
        }
	}

    public function actionProj(){

        if (isset($_GET['proj']) && is_numeric($_GET['proj'])){
            $details = Projects::model()->findByPK($_GET['proj']);
            $images = $this->getImages($_GET['proj']);
            $projSpecs = Projects::model()->getSpecifications($_GET['proj']);

            //set facebook thumbnail
            Yii::app()->params['pageIMG'] = '/images/projects/'.$_GET['proj'].'/thumb/'.$images[0]['imgName'];
            Yii::app()->params['pageType'] = 'article';
            Yii::app()->params['pageTitle'] = $details["title"];


            $this->render('proj',array('detalhes'=>$details,'imagens'=>$images,'especialidades'=>$projSpecs));
        }
    }

    /**
     * Returns all images
     * @param int proj_id with the project id
     * @return array with the images
     */
    public function getImages($id)
    {
        $images = Projimg::model()->findAll(array('condition'=>'proj_id='.$id));
        return $images;
    }

    /**
     * Returns first image
     * @param int proj_id with the project id
     * @return array with the image
     */
    public function getImage($id)
    {
        $image = Projimg::model()->findAll(array('condition'=>'proj_id='.$id,'limit'=>'1'));
        return $image;
    }

    /**
     * Sends an email on facebook comment submition
     */
    public function actionCom(){
        if(isset($_POST['action']))
        {
            $name='=?UTF-8?B?'.base64_encode("PE - Projetos de Engenharia").'?=';
            $subject='=?UTF-8?B?'.base64_encode('Novo comentário').'?=';
            $headers="From: $name <{$_POST['email']}>\r\n".
                "Reply-To: {$_POST['email']}\r\n".
                "MIME-Version: 1.0\r\n".
                "Content-Type: text/html; charset=UTF-8";

            $body = 'Foi adicionado um novo comentário a um projeto no website.<br/><br/>
        Visite '.$_POST['url']['href'].' para o visualizar.';
            mail($_POST['email'],$subject,$body,$headers);

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