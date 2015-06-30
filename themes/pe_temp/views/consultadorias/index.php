<?php
/* @var $this COnsultadoriasController */

$this->pageTitle=Yii::app()->name.' - Consultadorias';

?>

<div class="container-fluid projects">
    <div class="container containerClear">
        <div class="row">
            <div class="col-lg-12 pagTitle">
                CONSULTADORIAS
            </div>
        </div>
        <?php
        if ($todos!='noData'){
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
        }else{
            $htmlBody="";
            $htmlBody.='
            <div class="row">
                <div class="col-lg-12 noData">
                    Não existem dados nesta secção.
                </div>
            </div>
            ';
            echo $htmlBody;
            $htmlBody="";
        }
        ?>

    </div>
</div>

<script>
    var fullInfo=false;
    var isLoading = false;
    var dataOffset = $('.projects .container .projBox').length;

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height()-312) {
            if (!isLoading && !fullInfo){
                isLoading=true;
                $('.loading').css("display","block");
                $('.footer').css("display","none");

                $.ajax({
                    url: 'consultadorias',
                    type:"POST",
                    dataType: 'json',
                    data:{ offset: dataOffset, total: 6},
                    success: function(data){
                        //alert(data);
                        //check if no more items
                        if (data!="endData"){
                            //APPEND HTML TO BODY
                            $('.projects .container').append(data);
                            dataOffset = $('.projects .container .projBox').length;

                            isLoading=false;
                            //no more items
                        }else{
                            fullInfo=true;
                            $('.footer').css("display","block");
                        }

                        $('.loading').css("display","none");

                    },
                    error: function(){
                        $('.loading').css("display","none");
                        $('.footer').css("display","block");
                        isLoading=false;
                    }
                });
            }
        }

    });
</script>