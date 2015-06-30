<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="container-fluid errorPage">
    <div class="container">
        <div class="row">
            <div class="errorLogo col-lg-12">
                <img src="<?php echo Yii::app()->request->baseUrl;?>/images/error.png" alt="Error" />
            </div>
            <div class="errorTitle col-lg-12">
                Oops
            </div>
            <div class="errorDesc col-lg-12">
                Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.
            </div>

        </div>
    </div>
</div>