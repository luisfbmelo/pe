<?php

class InicioController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

	public function actionIndex()
	{
        $projects = Projects::model()->findAll();
        $totalProjects = count($projects);

        $sup = Supervision::model()->findAll();
        $totalSup = count($sup);

        $cons = Consulting::model()->findAll();
        $totalCons = count($cons);


		$this->render('index',array("totalProj"=>$totalProjects,"totalSup"=>$totalSup,"totalCons"=>$totalCons));
	}

    /**
     * Displays the login page
     */
    public function actionLogin()
    {


        $model=new LoginForm;

        // if it is ajax validation request
        if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if(isset($_POST['LoginForm']))
        {
            $model->attributes=$_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login',array('model'=>$model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        $this->render('error');
    }

    /*public function actionChange()
    {
        $allImages = Supimg::model()->findAll();

        foreach ($allImages as $todasImg){
            $originPath=Yii::getPathOfAlias('webroot').'/images/supervision/'.$todasImg["sup_id"].'/big/';
            $pathThumb=Yii::getPathOfAlias('webroot').'/images/supervision/'.$todasImg["sup_id"].'/thumb/';
            $finalName = $todasImg["imgName"];

            $path = explode('.',$originPath.$todasImg["imgName"]);
            $ext = end($path);

            //see what king of process it's needed
            if ($ext=="jpg" || $ext=="jpeg") {
                $imgt = "imagejpeg";
                $imgcreatefrom = "imagecreatefromjpeg";
            }else if ($ext == "png") {
                $imgt = "imagepng";
                $imgcreatefrom = "imagecreatefrompng";
            }else{
                $imgt = "imagegif";
                $imgcreatefrom = "imagecreatefromgif";
            }

            //origin photo
            $nova_foto = $imgcreatefrom($originPath.$finalName);

            //get dimensions
            $largura = imagesx($nova_foto);
            $altura = imagesy($nova_foto);

            //relação entre largura e altura da foto carregada
            $proporcao = $largura/$altura;

            //determinar dimensões do thumbnail e news
            $largura_thumb = 900;
            $altura_thumb = 900;

            //set ancor point
            // calculating the part of the image to use for thumbnail
            if ($largura > $altura) {
                $y = 0;
                $x = ($largura - $altura) / 2;
                $smallestSide = $altura;
            } else {
                $x = 0;
                $y = ($altura - $largura) / 2;
                $smallestSide = $largura;
            }

            /*THUMBNAIL*/

            //criar nova imagem fotográfica para o thumbnail
            /*$thumb_foto = imagecreatetruecolor($largura_thumb,$altura_thumb);
            imagecopyresized ($thumb_foto, $nova_foto, 0, 0, $x, $y, $largura_thumb, $altura_thumb, $smallestSide, $smallestSide);

            //gravar o ficheiro jpg com o thumbnail
            if ($imgt=="imagepng"){


                //thumb
                $white = imagecolorallocate($thumb_foto, 255, 255, 255);
                imagefill($thumb_foto, 0, 0, $white);

                $imgt($thumb_foto, $pathThumb.$finalName, 0);
            }else if ($imgt=="imagejpg"){

                $imgt($thumb_foto, $pathThumb.$finalName, 100);
            }else{

                $imgt($thumb_foto, $pathThumb.$finalName);
            }

        }

        die("!");
    }*/
}