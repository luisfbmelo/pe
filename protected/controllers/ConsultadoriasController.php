<?php

class ConsultadoriasController extends Controller
{
	public function actionIndex()
	{

        Yii::app()->params['pageType'] = 'global';

        //if session var not created
        if (!isset(Yii::app()->session['conTotal'])){
            Yii::app()->session['conTotal'] = 6;
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
            $totalGet = Yii::app()->session['conTotal'];
        }

        //query criterias
        $findCriteria = new CDbCriteria();
        $findCriteria->offset = $offset;
        $findCriteria->limit = $totalGet;
        $findCriteria->condition = 'isNews=0';
        $findCriteria->order = 'year DESC, dateCreated DESC';
        $consultadorias = Consulting::model()->findAll($findCriteria);

        //is ajax request
        if(Yii::app()->request->isAjaxRequest) {

            //if no more results
            if (count($consultadorias)==0){
                $result = 'endData';
            }else{

                //increment next total
                Yii::app()->session['conTotal']+=count($consultadorias);

                //print partial
                $result = $this->renderPartial('_list',array('todos'=>$consultadorias),true);
            }

            echo CJSON::encode($result);
            //is not ajax request
        } else {
            if (count($consultadorias)==0){
                $consultadorias='noData';
            }
            $this->render('index',array('todos'=>$consultadorias));
        }

	}

    public function actionCons(){

        if (isset($_GET['cons']) && is_numeric($_GET['cons'])){
            $details = Consulting::model()->findByPK($_GET['cons']);

            Yii::app()->params['pageType'] = 'cons';
            Yii::app()->params['pageTitle'] = $details["title"];

            $this->render('cons',array('detalhes'=>$details));
        }
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

            $body = 'Foi adicionado um novo comentário a uma consultadoria no website.<br/><br/>
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