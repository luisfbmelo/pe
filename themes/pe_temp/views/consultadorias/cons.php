<?php
/* @var $this ProjetosController */

$this->pageTitle=Yii::app()->name.' - Consultadorias';

$this->breadcrumbs=array(
    'Consultadorias'=>array('/consultadorias'),
    $detalhes["title"],
);

?>

<div class="container-fluid detail">
    <?php

    $bodyHTML="";

    $bodyHTML.='<div class="container">
        <div class="row">
            <div class="col-lg-12 detailTitle">
                '.$detalhes["title"].'
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">';

    /*PRINT FIRST PART AND THE BREACRUMBS*/
    echo $bodyHTML;
    $bodyHTML="";
    if(isset($this->breadcrumbs)):
        $this->widget('zii.widgets.CBreadcrumbs', array(
            'homeLink'=>CHtml::link('Início', array('inicio/index')),
            'links'=>$this->breadcrumbs,
        ));
    endif;
    /*END PRINT*/

    $bodyHTML.='
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-print-4">
                <h1>Consultadoria</h1>
                <p>'.$detalhes["author"].'</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-print-4">
                <h1>Ano</h1>
                <p>'.$detalhes["year"].'</p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-print-4">
                <h1>Local</h1>
                <p>'.$detalhes["location"].'</p>
            </div>

        </div>

        <div class="row">
                <div class="col-lg-12">
                    <div class="fb-like" style="padding-top:30px;" data-href="http://costapoim.pt'.Yii::app()->request->url.'" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12" id="comBox">
                    <div class="fb-comments" id="fb_chat" style="padding-top:15px;" data-href="http://costapoim.pt'.Yii::app()->request->url.'" data-numposts="5" data-colorscheme="light"></div>
                </div>
            </div>

    <!--CLOSING UPSTUFF-->
    </div>

    <script type="text/javascript">
        window.fbAsyncInit = function() {

            FB.init({
                appId      : \'256846677834649\',
                status: true,
                cookie: true,
                xfbml:  true,
                 version: \'v2.0\'
            });

                FB.Event.subscribe(\'comment.create\', function(response) {
                    var data = {
                        action: \'fb_comment\',
                        url: response,
                        email : \''.Yii::app()->params['adminEmail'].'\'
                    };


                    var baseUrl = \''.Yii::app()->request->baseUrl.'\';
                    $.post(baseUrl+\'/fiscalizacoes/com\', data);


                });

        }
    </script>';
    echo $bodyHTML;
    ?>
</div>

