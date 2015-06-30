<?php
/* @var $this ProjetosController */
?>
<?php
$count=0;
$htmlBody="";
foreach($todos as $all){
    switch($all["type"]){
        case 1:
            $type="projects";
            break;
        case 2:
            $type="supervision";
            break;
        case 3:
            $type="consulting";
            break;
    }
    /* GET IMAGE */
    $finalImg="";
    $thisImg = $this->getImage($all["id"],$all["type"]);

    if ($thisImg!=null){
        foreach($thisImg as $useimg){
            $finalImg = $useimg["imgName"];
        }
    }
    /* END IMAGE */

    $htmlBody.='<div class="row">
                    <div class="col-lg-12">
                        <a href="destaques/dest/rs/'.$all["type"].'/proj/'.$all["id"].'" class="newsBox">
                            <div class="newsImg">
                                <img src="'.Yii::app()->request->baseUrl.'/images/'.$type.'/'.$all["id"].'/big/'.$finalImg.'" alt="'.$all["title"].'" class="img-responsive news-img-item"/>
                                <img src="'.Yii::app()->request->baseUrl.'/images/icons/link.png" alt="Link" class="linkICO"/>
                            </div>
                            <div class="newsHeader">
                                <h1>'.$all["title"].'</h1>
                                <small>'.$this->convertDate($all["dateCreated"]).'</small>
                            </div>
                            <div class="newsBody">
                                '.$this->truncate($all["desc"],400).'
                            </div>
                        </a>
                    </div>
                </div>';
    echo $htmlBody;
    $htmlBody="";
}  ?>