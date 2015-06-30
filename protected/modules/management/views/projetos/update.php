<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projetos'=>array('index'),
	'Atualizar projeto',
);

$this->menu=array(
	array('label'=>'Gerir projetos', 'url'=>array('index')),
	array('label'=>'Criar projeto', 'url'=>array('create')),
	array('label'=>'Visualizar o projeto', 'url'=>array('view', 'id'=>$model->id_proj)),
	//array('label'=>'Gerir Projetos', 'url'=>array('admin')),
);
?>


    <div class="row">
        <div class="col-lg-12 pagTitle">
            ATUALIZAR PROJETO
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


<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>