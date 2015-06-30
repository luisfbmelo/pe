<?php
/* @var $this ProjetosController */
?>

<?php
$count=0;
$htmlBody="";
foreach($todos as $all){

    /* GET IMAGE */
    $finalImg="";
    $supImage = $this->getImage($all["id_sup"]);

    foreach($supImage as $useimg){
        $finalImg = $useimg["imgName"];
    }
    /* END IMAGE */


    if ($count%3==0){
        $htmlBody.='<div class="row">';
    }

    $htmlBody.='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-print-4">
                <a href="fiscalizacoes/fisc/fisc/'.$all["id_sup"].'" class="projBox">
                    <div class="projTitle">
                        '.$all["title"].'
                    </div>
                    <div class="thumbnail">';
                        //IMAGES
                        if ($finalImg!=""){
                            $htmlBody.='<img src="'.Yii::app()->request->baseUrl.'/images/supervision/'.$all["id_sup"].'/thumb/'.$finalImg.'" alt="'.$all["title"].'" class="projImg img-responsive"/>';
                        }else{
                            $htmlBody.='<img src="http://placehold.it/300x300" alt="'.$all["title"].'" class="projImg img-responsive"/>';
                        }
                        //LINK ICON
                        $htmlBody.='<img src="'.Yii::app()->request->baseUrl.'/images/icons/link.png" alt="Link" class="linkICO"/>
                    </div>
                    <div class="projDetail">
                        <p>'.$all["year"].'</p>
                        <p>'.$all["location"].'</p>
                    </div>
                    <div class="projLink">
                        <span>Ler mais...</span>
                    </div>
                </a>
            </div>';

    $count++;
    if ($count%3==0 || sizeof($todos)==$count){
        $htmlBody.='</div>';
    }
    echo $htmlBody;
    $htmlBody="";
}

?>