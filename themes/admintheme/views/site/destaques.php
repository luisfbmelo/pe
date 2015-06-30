<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name.' - Destaques';
?>

<div class="container-fluid news">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 pagTitle">
                        DESTAQUES
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="destaque_detalhe.php" class="newsBox">
                            <div class="newsImg">
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/projects/1/1.jpg" alt="Noticia" class="img-responsive news-img-item"/>
                                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/link.png" alt="Link" class="linkICO"/>
                            </div>
                            <div class="newsHeader">
                                <h1>Escola Básica Integrada Angra do Heroísmo</h1>
                                <small>8 de Fevereiro de 2014</small>
                            </div>
                            <div class="newsBody">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie justo nec sapien interdum rutrum. Suspendisse suscipit, risus id vehicula imperdiet, nibh nibh sollicitudin libero, eu semper diam tortor sed elit. Nulla non metus turpis. Maecenas dictum vulputate rhoncus. Vivamus imperdiet tortor sit amet est vulputate porta. Sed sit amet luctus est, eget vestibulum lacus. Donec at dui convallis, eleifend mauris at, dictum lacus. Sed porta dictum turpis vel placerat. Duis commodo...
                            </div>
                        </a>
                    </div>
                </div>


            </div>
        </div>
