<?php
/* @var $this ProjetosController */
?>

<?php
$count=0;
$htmlBody="";
foreach($todos as $all){
    if ($count%3==0){
        $htmlBody.='<div class="row">';
    }
    $htmlBody.='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-print-4">
                    <a href="consultadorias/cons/cons/'.$all["id_con"].'" class="projBox consBox">
                        <div class="projTitle" style="border-bottom: 1px solid #aaa">'.$all["title"].'</div>
                        <div class="projDetail">
                            <p>'.$all["year"].'</p>
                            <p>'.$all["location"].'</p>
                        </div>
                        <div class="projLink">
                            <span>Ler mais...</span>
                        </div>
                        <img src="'.Yii::app()->request->baseUrl.'/images/icons/link.png" alt="Link" class="linkICO"/>
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