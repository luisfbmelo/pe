<?php

class ManagementModule extends CWebModule
{
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'management.models.*',
			'management.components.*',
		));

        Yii::app()->theme = 'admintheme';

        Yii::app()->setComponents(array(
            'errorHandler'=>array(
                'errorAction'=>'management/inicio/error',
               )
            )
        );

	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{

            // this method is called before any module controller action is performed
			// you may place customized code here
            if (!Yii::app()->user->isGuest){
                return true;
            }else if($action->id!='login'){
                Yii::app()->user->returnUrl = Yii::app()->request->requestUri;
                Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl('management/inicio/login'));
            }
            return true;

		}
		else{
            return false;
        }

	}
}
