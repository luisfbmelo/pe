<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!--IMG HEADER-->
<div class="container-fluid img-header">
    <div class="row">
        <div class="col-lg-12">
            <div class="companyBox container">
                <div class="companyBoxControl">
                    <div class="companyName">P.E - Projetos de Engenharia</div>
                    <div class="companyDesc">Empresa vocacionada para os Projetos de Construção Civil e para a Coordenação e Fiscalização de Obras, fundada em 2000.</div>
                </div>
            </div>

        </div>
    </div>
</div>

<!--SERVICES-->
<div class="container index-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="pagTitle">SERVIÇOS</div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/services/chart.png" alt="Grafico" class="img-responsive serImg" />
                <p>PARECERES DE CONSULTORIA</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/services/assistance.png" alt="Assistencia" class="img-responsive serImg" />
                <p>ASSISTÊNCIA TÉCNICA</p>
                <p>Fases de preparação, lançamento e apreciação de concursos.</p>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-xs-12">
            <div class="thumbnail">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/services/connect.png" alt="Assistencia" class="img-responsive serImg" />
                <p>GESTÃO</p>
                <p>Gestão de Projeto, controlo de qualidade, custos e prazos durante a realização das obras.</p>
            </div>
        </div>
    </div>
</div>

<!--SECTORS-->
<div class="container-fluid index-content sectors">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="pagTitle">SETORES DE ATIVIDADE</div>
            </div>
        </div>

        <div class="row items">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/1.jpg" alt="Sector"/>
                    <p>ESTRUTURAS, FUNDAÇÕES, REABILITAÇÃO E REFORÇO ESTRUTURAL</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/2.jpg" alt="Sector"/>
                    <p>VERIFICAÇÃO DA QUALIDADE E REVISÃO DE PROJETOS</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/3.jpg" alt="Sector"/>
                    <p>ARRUAMENTOS, VIAS DE COMUNICAÇÃO E OBRAS DE ARTE</p>
                </div>
            </div>
        </div>

        <div class="row items">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/4.jpg" alt="Sector"/>
                    <p>SANEAMENTO BÁSICO</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/5.jpg" alt="Sector"/>
                    <p>INSTALAÇÕES ELÉTRICAS, TELECOMUNICAÇÕES</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/6.jpg" alt="Sector"/>
                    <p>SEGURANÇA CONTRA INCÊNDIOS</p>
                </div>
            </div>
        </div>

        <div class="row items">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/7.jpg" alt="Sector"/>
                    <p>ACÚSTICA DOS EDIFÍCIOS</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/8.jpg" alt="Sector"/>
                    <p>RSECE, ANÁLISE TÉRMICA</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="thumbnail">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/sectors/9.jpg" alt="Sector"/>
                    <p>COORDENAÇÃO E FISCALIZAÇÃO DE OBRAS</p>
                </div>
            </div>
        </div>
    </div>


</div>
