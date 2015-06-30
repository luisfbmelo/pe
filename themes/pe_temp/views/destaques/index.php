<?php
/* @var $this DestaquesController */

$this->pageTitle=Yii::app()->name.' - Destaques';
?>

<div class="container-fluid news">
    <div class="container containerClear">
        <div class="row">
            <div class="col-lg-12 pagTitle">
                DESTAQUES
            </div>
        </div>

        <?php
        if ($todos!='noData'){
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

                if ($type!='consulting'){
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
                }else{
                    $htmlBody.='<div class="row">
                        <div class="col-lg-12">
                            <a href="destaques/dest/rs/'.$all["type"].'/proj/'.$all["id"].'" class="newsBox consBox">
                               <div class="newsHeader">
                                    <h1>'.$all["title"].'</h1>
                                    <small>'.$this->convertDate($all["dateCreated"]).'</small>
                                </div>
                                <div class="newsBody">
                                    '.$this->truncate($all["desc"],400).'
                                </div>
                                <img src="'.Yii::app()->request->baseUrl.'/images/icons/link.png" alt="Link" class="linkICO"/>
                            </a>
                        </div>
                    </div>
                    ';
                    echo $htmlBody;
                    $htmlBody="";
                }

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
        }?>


    </div>
</div>

<script>
    var fullInfo=false;
    var isLoading = false;
    var dataOffset = $('.newsBox').length;

    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height()-312) {
            if (!isLoading && !fullInfo){
                isLoading=true;
                $('.loading').css("display","block");
                $('.footer').css("display","none");

                $.ajax({
                    url: 'destaques',
                    type:"POST",
                    dataType: 'json',
                    data:{ offset: dataOffset, total: 6},
                    success: function(data){
                        //alert(data);
                        //check if no more items
                        if (data!="endData"){
                            //APPEND HTML TO BODY
                            $('.news .container').append(data);
                            dataOffset = $('.newsBox').length;

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