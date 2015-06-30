<?php /* @var $this Controller */

//SE BROWSER FOR IE7 OU MENOR
function iever($compare=false, $to=NULL){
    if(!preg_match('/MSIE (.*?);/', $_SERVER['HTTP_USER_AGENT'], $m)
        || preg_match('#Opera#', $_SERVER['HTTP_USER_AGENT']))
        return false === $compare ? false : NULL;

    if(false !== $compare
        && in_array($compare, array('<', '>', '<=', '>=', '==', '!='))
        && in_array((int)$to, array(5,6,7,8,9,10))){
        return eval('return ('.$m[1].$compare.$to.');');
    }
    else{
        return (int)$m[1];
    }
}

if (iever('<=', 7)){
    include ('includes/browser_require.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <!--META DATA-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" rel="SHORTCUT ICON"/>

    <meta name="description" content="Empresa vocacionada para os Projetos de Construção Civil e para a Coordenação e Fiscalização de Obras, fundada em 2000.">
    <meta name="keywords" content="empresa, projetos,construção,civil,coordenação,fiscalização,obras,fundada,2000,dois,mil,pe,p.e,p.e.,engenharia, serviços, pareceres, consultoria, assistência, técnica, gestão, estruturas,fundações, qualidade, revisão, comunicação, vias, telecomunicação, instalações, elétrica, segurança, contra, incêndios, saneamento, acústica, edifícios, análise, térmica">
    <meta name="author" content="Marco Poim, Helena Vargas, Haiane Madeira">
    <!--END METADATA-->

	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />-->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/management.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

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
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <!--bootstrap IE8 fix-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/html5shiv/src/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/respond.js"></script>
    <!--multifile-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/multifile/jquery.multifile.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/script/multifile/plugins/jquery.multifile.preview.js"></script>
    <!--END JS-->

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php if (!Yii::app()->user->isGuest){?>
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
                    <a class="navbar-brand" href="../inicio/index"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" alt="Logo" class="img-responsive"/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="pe-navbar-menu">

                        <?php $this->widget('zii.widgets.CMenu',array(
                            'htmlOptions'=>array('class'=>'nav navbar-nav'),
                            'items'=>array(
                                array('label'=>'Início', 'url'=>array('/management/inicio'),'active'=>Yii::app()->controller->id=='inicio'),
                                array('label'=>'Projetos', 'url'=>array('/management/projetos'),'active'=>Yii::app()->controller->id=='projetos'),
                                array('label'=>'Fiscalizações', 'url'=>array('/management/fiscalizacoes'),'active'=>Yii::app()->controller->id=='fiscalizacoes'),
                                array('label'=>'Consultadorias', 'url'=>array('/management/consultadorias'),'active'=>Yii::app()->controller->id=='consultadorias'),
                                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/management/inicio/logout'),'visible'=>!Yii::app()->user->isGuest)
                            ),
                        )); ?>
                </div><!-- /.navbar-collapse -->
                <div class="clearfix"></div>
            </div>

        </div><!-- /.container-fluid -->

    </nav>
    <!--END NAV-->

    <!--BREADCRUMBS-->
    <!--<div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php /*if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'homeLink'=>CHtml::link('Início', array('/manager/default/index')),
                        'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                <?php endif*/?>
            </div>
        </div>
    </div>-->
    <!--END BREADCRUMBS-->
<?php }?>

    <!--CONTENT-->
	<?php echo $content; ?>
    <!--END CONTENT-->

	<div class="clear"></div>


    <!--JS-->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/modernizr.js"></script>
    <script type='text/javascript' src="<?php echo Yii::app()->request->baseUrl; ?>/script/css3-mediaqueries.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/script/script.js"></script>



</body>
</html>
