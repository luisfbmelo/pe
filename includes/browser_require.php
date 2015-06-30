    <html>
        <head>
            <!--META DATA-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0 ">
            <meta charset="utf-8">
            <link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="SHORTCUT ICON"/>

            <meta name="description" content="Empresa vocacionada para os Projetos de Construção Civil e para a Coordenação e Fiscalização de Obras, fundada em 2000.">
            <meta name="keywords" content="empresa, projetos,construção,civil,coordenação,fiscalização,obras,fundada,2000,dois,mil,pe,p.e,p.e.,engenharia, serviços, pareceres, consultoria, assistência, técnica, gestão, estruturas,fundações, qualidade, revisão, comunicação, vias, telecomunicação, instalações, elétrica, segurança, contra, incêndios, saneamento, acústica, edifícios, análise, térmica">
            <meta name="author" content="Marco Poim, Helena Vargas, Haiane Madeira">
            <!--END METADATA-->

            <!-- blueprint CSS framework -->
            <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css""/>

            <!--FACEBOOK-->
            <meta property="og:image" content="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png"/>
            <link rel="image_src" href="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" />

            <meta property="og:description" content="Empresa vocacionada para os Projetos de Construção Civil e para a Coordenação e Fiscalização de Obras, fundada em 2000.">
            <!--END FACEBOOK-->

            <!--CSS-->
            <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/css/bootstrap.css">
            <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
            <!--END CSS-->

            <!--JS-->
            <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>

            <!--bootstrap IE8 fix-->
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/html5shiv/src/html5shiv.js"></script>
            <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/respond.js"></script>
            <!--END JS-->

            <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        </head>
        <body>
            <div class="container-fluid browser">
                <div class="container" style="height:100%;">
                    <div class="row" style="height:100%;">
                        <div class="col-lg-12" style="height:100%;">
                            <div class="browserBox">
                                <h1>Navegador não suportado</h1>
                                <div class="message">
                                    <p>O seu navegador não é suportado pelo website que está a tentar aceder.</p>
                                    <p>Recomenda-se que visualize a página através de um dos seguintes navegadores:</p>
                                </div>
                                <div class="browsers">
                                    <ul>
                                        <li><a href="http://www.opera.com/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/browsers/opera.png"/><span>Opera</span></a></li>
                                        <li><a href="http://www.mozilla.org/pt-PT/firefox"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/browsers/firefox.png"/><span>Mobile Firefox</span></a></li>
                                        <li><a href="https://www.google.com/intl/pt-PT/chrome/browser/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/browsers/chrome.png"/><span>Google Chrome</span></a></li>
                                    </ul>
                                    <div class="clearAll"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <script>
                $(document).ready(function(){
                    var obj= $('.browserBox');
                    var objHeight = obj.height();
                    $('.browserBox').css('margin-top','-'+objHeight+'px');
                });
            </script>

        </body>
    </html>
