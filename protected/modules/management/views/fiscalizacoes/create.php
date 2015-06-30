<?php
/* @var $this SupervisionController */
/* @var $model Supervision */

$this->breadcrumbs=array(
    'Fiscalizações'=>array('index'),
    'Criar',
);

$this->menu=array(
    array('label'=>'Gerir fiscalizações', 'url'=>array('index')),
    //array('label'=>'Gerir projetos', 'url'=>array('admin')),
);
?>

    <div class="row">
        <div class="col-lg-12 pagTitle">
            NOVA FISCALIZAÇÃO
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 managementCrumbs">
            <?php
            /*PRINT FIRST PART AND THE BREACRUMBS*/

            if(isset($this->breadcrumbs)):
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'homeLink'=>CHtml::link('Início', array('inicio/index')),
                    'links'=>$this->breadcrumbs,
                ));
            endif;
            /*END PRINT*/
            ?>
        </div>
    </div>


<?php $this->renderPartial('_formCreate', array('model'=>$model)); ?>