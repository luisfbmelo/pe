<?php
/* @var $this ProjetosController */

$this->pageTitle=Yii::app()->name.' - Destaques';

$this->breadcrumbs=array(
    'Destaques'=>array('/destaques'),
    $detalhes["title"],
);

?>

<div class="container-fluid detail-page">
     <?php
     switch($detalhes["type"]){
         case 1:
             $type="projects";
             $id = $detalhes['id_proj'];
             $typeTitle = 'Arquitetura';
             break;
         case 2:
             $type="supervision";
             $id = $detalhes['id_sup'];
             $typeTitle = 'Fiscalização';
             break;
         case 3:
             $type="consulting";
             $id = $detalhes['id_con'];
             $typeTitle = 'Consultadoria';
             break;
     }

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
     $bodyHTML.='</div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <small>'.$this->convertDate($detalhes["dateCreated"]).'</small>
            </div>
        </div>';

     if (isset($imagens) && isset($_GET['rs']) && isset($_GET['proj']) && is_numeric($_GET['rs']) && is_numeric($_GET['proj']) && $imagens!=null){
        $bodyHTML.='<div class="row">
            <div class="col-lg-12">
                <div id="det-image-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">';

    $count=0;

        foreach ($imagens as $todasImg){
            if ($count==0){
                $bodyHTML.='<li data-target="#det-image-carousel" data-slide-to="'.$count.'" class="active"></li>';
            }else{
                $bodyHTML.='<li data-target="#det-image-carousel" data-slide-to="'.$count.'"></li>';
            }
            $count++;
        }

                    $bodyHTML.='</ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">';
     $count=0;

         foreach ($imagens as $todasImg){
             if ($count==0){
                     $bodyHTML.='<div class="item active">
                                    <img src="'.Yii::app()->request->baseUrl.'/images/'.$type.'/'.$id.'/big/'.$todasImg["imgName"].'" alt="'.$detalhes["title"].'" class="projImg img-responsive"/>
                                </div>';


             }else{
                     $bodyHTML.='<div class="item">
                                    <img src="'.Yii::app()->request->baseUrl.'/images/'.$type.'/'.$id.'/big/'.$todasImg["imgName"].'" alt="'.$detalhes["title"].'" class="projImg img-responsive"/>
                                </div>';

             }
             $count++;
         }

     $count=0;
     $bodyHTML.='</div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#det-image-carousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#det-image-carousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>
        </div>';
    }
        $bodyHTML.='<div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 col-print-4">
                <h1>'.$typeTitle.'</h1>
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
            <div class="col-lg-12 detailBody">
                '.$detalhes["desc"].'
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
    </script>
    ';
     echo $bodyHTML;
     ?>
</div>
