<?php

class DestaquesController extends Controller
{
    public function actionIndex()
    {

        Yii::app()->params['pageType'] = 'global';

        //if session var not created
        if (!isset(Yii::app()->session['destTotal'])){
            Yii::app()->session['destTotal'] = 6;
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
            $totalGet = Yii::app()->session['destTotal'];
        }

        //query
        $sql='(Select
                projects.id_proj as id,
                projects.title,
                projects.desc,
                projects.dateCreated,
                projects.year,
                projects.type
            from projects
            where isNews=1)
                    Union ALL
            (Select
                supervision.id_sup as id,
                supervision.title,
                supervision.desc,
                supervision.dateCreated,
                supervision.year,
                supervision.type
            from supervision
            where isNews=1)
                    Union ALL
            (Select
                consulting.id_con as id,
                consulting.title,
                consulting.desc,
                consulting.dateCreated,
                consulting.year,
                consulting.type
            from consulting
            where isNews=1)
        ORDER BY dateCreated DESC LIMIT :offset,:total';


        $command = Yii::app()->db->createCommand($sql);
        $command->bindParam(":offset",$offset,PDO::PARAM_INT);
        $command->bindParam(":total",$totalGet,PDO::PARAM_INT);
        $resultData = $command->queryAll();

        //is ajax request
        if(Yii::app()->request->isAjaxRequest) {

            //if no more results
            if (count($resultData)==0){
                $result = 'endData';
            }else{

                //increment next total
                Yii::app()->session['destTotal']+=count($resultData);

                //print partial
                $result = $this->renderPartial('_list',array('todos'=>$resultData),true);
            }

            echo CJSON::encode($result);
            //is not ajax request
        } else {
            if (count($resultData)==0){
                $resultData='noData';
            }
            $this->render('index',array('todos'=>$resultData));
        }


    }

    public function actionDest(){

        if (isset($_GET['rs']) && isset($_GET['proj']) && is_numeric($_GET['rs']) && is_numeric($_GET['proj'])){
            $images = $this->getImages($_GET['proj'],$_GET['rs']);

            switch($_GET['rs']){
                case 1:
                    $details = Projects::model()->findByPK($_GET['proj']);

                    //set facebook thumbnail
                    Yii::app()->params['pageIMG'] = '/images/projects/'.$_GET['proj'].'/thumb/'.$images[0]['imgName'];
                    Yii::app()->params['pageType'] = 'article';
                    Yii::app()->params['pageTitle'] = $details["title"];

                    break;
                case 2:
                    $details = Supervision::model()->findByPK($_GET['proj']);

                    //set facebook thumbnail
                    Yii::app()->params['pageIMG'] = '/images/supervision/'.$_GET['proj'].'/thumb/'.$images[0]['imgName'];
                    Yii::app()->params['pageType'] = 'article';
                    Yii::app()->params['pageTitle'] = $details["title"];

                    break;
                case 3:
                    $details = Consulting::model()->findByPK($_GET['proj']);

                    //set facebook vars
                    Yii::app()->params['pageType'] = 'cons';
                    Yii::app()->params['pageTitle'] = $details["title"];

                    break;
            }

            $this->render('dest',array('detalhes'=>$details,'imagens'=>$images));
        }
    }

    /**
     * Returns first image
     * @param int proj_id with the project id
     * @return array with the image
     */
    public function getImage($id,$type)
    {
        switch($type){
            case 1:
                $image = Projimg::model()->findAll(array('condition'=>'proj_id='.$id,'limit'=>'1'));
                break;
            case 2:
                $image = Supimg::model()->findAll(array('condition'=>'sup_id='.$id,'limit'=>'1'));
                break;
            case 3:
                $image = null;
                break;
        }

        return $image;

    }

    /**
     * Returns all images
     * @param int proj_id with the project id
     * @return array with the images
     */
    public function getImages($id,$type)
    {

        switch($type){
            case 1:
                $images = Projimg::model()->findAll(array('condition'=>'proj_id='.$id));
                break;
            case 2:
                $images = Supimg::model()->findAll(array('condition'=>'sup_id='.$id));
                break;
            case 3:
                $images = null;
                break;
        }
        return $images;
    }

    public function convertDate($date)
    {

        // convert to display format
        $date = strtotime($date);
        $date = date('j', $date).' de '.$this->monthConverter(date('n', $date)).' de '.date('Y', $date);

        return $date;
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

    /**
     * Truncates text.
     *
     * Cuts a string to the length of $length and replaces the last characters
     * with the ending if the text is longer than length.
     *
     * @param string  $text String to truncate.
     * @param integer $length Length of returned string, including ellipsis.
     * @param string  $ending Ending to be appended to the trimmed string.
     * @param boolean $exact If false, $text will not be cut mid-word
     * @param boolean $considerHtml If true, HTML tags would be handled correctly
     * @return string Trimmed string.
     */
    public function truncate($text, $length = 100, $ending = '...', $exact = true, $considerHtml = false) {
        if ($considerHtml) {
            // if the plain text is shorter than the maximum length, return the whole text
            if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
                return $text;
            }

            // splits all html-tags to scanable lines
            preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);

            $total_length = strlen($ending);
            $open_tags = array();
            $truncate = '';

            foreach ($lines as $line_matchings) {
                // if there is any html-tag in this line, handle it and add it (uncounted) to the output
                if (!empty($line_matchings[1])) {
                    // if it's an "empty element" with or without xhtml-conform closing slash (f.e. <br/>)
                    if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
                        // do nothing
                        // if tag is a closing tag (f.e. </b>)
                    } else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
                        // delete tag from $open_tags list
                        $pos = array_search($tag_matchings[1], $open_tags);
                        if ($pos !== false) {
                            unset($open_tags[$pos]);
                        }
                        // if tag is an opening tag (f.e. <b>)
                    } else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
                        // add tag to the beginning of $open_tags list
                        array_unshift($open_tags, strtolower($tag_matchings[1]));
                    }
                    // add html-tag to $truncate'd text
                    $truncate .= $line_matchings[1];
                }

                // calculate the length of the plain text part of the line; handle entities as one character
                $content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
                if ($total_length+$content_length> $length) {
                    // the number of characters which are left
                    $left = $length - $total_length;
                    $entities_length = 0;
                    // search for html entities
                    if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|&#x[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
                        // calculate the real length of all entities in the legal range
                        foreach ($entities[0] as $entity) {
                            if ($entity[1]+1-$entities_length <= $left) {
                                $left--;
                                $entities_length += strlen($entity[0]);
                            } else {
                                // no more characters left
                                break;
                            }
                        }
                    }
                    $truncate .= substr($line_matchings[2], 0, $left+$entities_length);
                    // maximum lenght is reached, so get off the loop
                    break;
                } else {
                    $truncate .= $line_matchings[2];
                    $total_length += $content_length;
                }

                // if the maximum length is reached, get off the loop
                if($total_length>= $length) {
                    break;
                }
            }
        } else {
            if (strlen($text) <= $length) {
                return $text;
            } else {
                $truncate = substr($text, 0, $length - strlen($ending));
            }
        }

        // if the words shouldn't be cut in the middle...
        if (!$exact) {
            // ...search the last occurance of a space...
            $spacepos = strrpos($truncate, ' ');
            if (isset($spacepos)) {
                // ...and cut the text in this position
                $truncate = substr($truncate, 0, $spacepos);
            }
        }

        // add the defined ending to the text
        $truncate .= $ending;

        if($considerHtml) {
            // close all unclosed html-tags
            foreach ($open_tags as $tag) {
                $truncate .= '</' . $tag . '>';
            }
        }

        return $truncate;

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

            $body = 'Foi adicionado um novo comentário a um destaque no website.<br/><br/>
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