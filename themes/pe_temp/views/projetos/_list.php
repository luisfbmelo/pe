<?php
/* @var $this ProjetosController */
?>

            <?php
            $count=0;
            $htmlBody="";
            foreach($todos as $all){

                /* GET IMAGE */
                $finalImg="";
                $projImage = $this->getImage($all["id_proj"]);

                foreach($projImage as $useimg){
                    $finalImg = $useimg["imgName"];
                }
                /* END IMAGE */

                if ($count%3==0){
                    $htmlBody.='<div class="row">';
                }
                $htmlBody.='<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-print-4">
                    <a href="projetos/proj/proj/'.$all["id_proj"].'" class="projBox">
                        <div class="projTitle">'.$all["title"].'</div>
                        <div class="thumbnail">
                            <img src="'.Yii::app()->request->baseUrl.'/images/projects/'.$all["id_proj"].'/thumb/'.$finalImg.'" alt="'.$all["title"].'" class="projImg img-responsive"/>
                            <img src="'.Yii::app()->request->baseUrl.'/images/icons/link.png" alt="Link" class="linkICO"/>
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