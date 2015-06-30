<?php /* @var $this Controller */

//SE BROWSER FOR IE7 OU MENOR
function ieverasd($compare=false, $to=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m) || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT']))
        return false === $compare ? false : NULL;

    if(false !== $compare && in_array($compare, array('<', '>', '<=', '>=', '==', '!=')) && in_array((int)$to, array(5,6,7,8,9,10))){
        return eval('return ('.$m[1].$compare.$to.');');
    }
    else{
        return (int)$m[1];
    }
}

$result = ieverasd('<=', 7);

if ($result){
    //echo 'includes/browser_require.php';
    include_once ('includes/browser_require.php');
    exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <!--META DATA-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php if (Yii::app()->params['pageType'] == 'article'){?>
        <meta property="og:image" content="http://costapoim.pt<?php echo Yii::app()->request->baseUrl.Yii::app()->params['pageIMG']; ?>"/>
        <link rel="image_src" href="http://costapoim.pt<?php echo Yii::app()->request->baseUrl.Yii::app()->params['pageIMG']; ?>" />
    <?php }else if(Yii::app()->params['pageType'] == 'global' || Yii::app()->params['pageType'] == 'cons'){?>
        <meta property="og:image" content="http://costapoim.pt<?php echo Yii::app()->request->baseUrl.Yii::app()->params['globalIMG']; ?>"/>
        <link rel="image_src" href="http://costapoim.pt<?php echo Yii::app()->request->baseUrl.Yii::app()->params['globalIMG']; ?>" />
    <?php }?>


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


    <?php if (Yii::app()->params['pageType'] == 'article' || Yii::app()->params['pageType'] == 'cons'){?>
        <title><?php echo Yii::app()->params['pageTitle']; ?></title>
        <meta property="og:title" content="<?php echo Yii::app()->params['pageTitle'];  ?>"/>
    <?php }else if(Yii::app()->params['pageType'] == 'global'){?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <meta property="og:title" content="<?php echo CHtml::encode($this->pageTitle);  ?>"/>
    <?php }?>

</head>

<body>
<!--FACEBOOK PLUGIN-->
<script>
    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>
<!--END FACEBOOK PLUGIN-->

    <!--NAV-->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header navbar-left">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#pe-navbar-menu">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo Yii::app()->request->baseUrl; ?>/inicio"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Logo" class="img-responsive"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="pe-navbar-menu">

                        <?php $this->widget('zii.widgets.CMenu',array(
                            'htmlOptions'=>array('class'=>'nav navbar-nav'),
                            'items'=>array(
                                array('label'=>'Início', 'url'=>array('/inicio'),'active'=>Yii::app()->controller->id=='inicio'),
                                array('label'=>'Projetos', 'url'=>array('/projetos'),'active'=>Yii::app()->controller->id=='projetos'),
                                array('label'=>'Fiscalizações', 'url'=>array('/fiscalizacoes'),'active'=>Yii::app()->controller->id=='fiscalizacoes'),
                                array('label'=>'Consultadorias', 'url'=>array('/consultadorias'),'active'=>Yii::app()->controller->id=='consultadorias'),
                                array('label'=>'Contatos', 'url'=>array('/contatos'),'active'=>Yii::app()->controller->id=='contatos'),
                                array('label'=>'Destaques', 'url'=>array('/destaques'),'active'=>Yii::app()->controller->id=='destaques')
                            ),
                        )); ?>
                </div><!-- /.navbar-collapse -->
                <div class="clearfix"></div>
            </div>

        </div><!-- /.container-fluid -->

    </nav>
    <!--END NAV-->

    <!--BREADCRUMBS-->
	<?php /*if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif*/?>
    <!--END BREADCRUMBS-->

    <!--CONTENT-->
	<?php echo $content; ?>
    <!--END CONTENT-->

	<div class="clear"></div>

    <!--FOOTER-->
    <div class="container-fluid footer">
        <div class="container">
            <div class="row fooTitle">
                <div class="col-lg-12 col-print-12">
                    Encontre-nos em.
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12 col-print-4">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col-print-12">
                            <a href="https://www.facebook.com/pages/PE-Projectos-de-Engenharia/106901136012264" target="_blank" class="facebook"></a>
                            <a href="http://www.pinterest.com/costapoim/" target="_blank" class="pinterest"></a>
                            <div class="clearAll"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12 certificate-footer col-print-6">
                    <p>Elaboração de Projetos de Engenharia e Coordenação de Segurança em Projeto. Fiscalização de Obras Pùblicas e Privadas e Coordenação de Segurança em Obra.</p>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 certificate-footer col-print-2">
                    <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/certificate2.png" alt="Certificado" class="img-responsive"/>
                </div>


            </div>
            <div class="row copyright">
                <div class="col-lg-12">
                    © Copyright 2013 <strong>PE - Projetos de Engenharia</strong> Todos os direitos reservados
                </div>
            </div>
        </div>
    </div>
	<!--END FOOTER-->

    <!--LOADING BAR-->
    <div class="container-fluid loading" style="display:none;">
        <div class="row">
            <div class="col-lg-12">
                <span class="glyphicon glyphicon-repeat icon-large"></span>
            </div>
        </div>
    </div>
    <!--END LOADING BAR-->

    <!--JS-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/modernizr.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/script/css3-mediaqueries.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/script.js"></script>

    <script type="text/javascript">


            /*FIX FACEBOOK*/
            if ($("#fb_chat").length>0){
                var fb_chat = document.getElementById('fb_chat');
                var container_width = document.getElementById('comBox').clientWidth - 30;
                var attr = document.createAttribute('data-width');
                attr.nodeValue = container_width.toString();
                fb_chat.attributes.setNamedItem(attr);

            }


    </script>

</body>
</html>
