<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>


<div class="row">
    <div class="col-lg-12">
        <div class="form">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'supervision',
                // Please note: When you enable ajax validation, make sure the corresponding
                // controller action is handling ajax validation correctly.
                // There is a call to performAjaxValidation() commented in generated controller code.
                // See class documentation of CActiveForm for details on this.
                'enableAjaxValidation'=>false,
                'htmlOptions' => array('enctype' => 'multipart/form-data'),
            )); ?>

            <?php echo $form->errorSummary($model); ?>

            <div class="row">
                <div class="col-lg-12">
                    <p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'title'); ?>
                    <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'form-control','id'=>'title')); ?>
                    <?php //echo $form->error($model,'title'); ?>
                </div>

            </div>

            <!--<div class="row">
                <div class="col-lg-12">
                    <?php //echo $form->labelEx($model,'author'); ?>
                    <?php //echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255,'class'=>'form-control','id'=>'author')); ?>
                    <?php //echo $form->error($model,'author'); ?>
                </div>

            </div>-->

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'year'); ?>
                    <?php echo $form->textField($model,'year',array('size'=>45,'maxlength'=>45,'class'=>'form-control','id'=>'year')); ?>
                    <?php //echo $form->error($model,'year'); ?>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'location'); ?>
                    <?php echo $form->textField($model,'location',array('size'=>60,'maxlength'=>255,'class'=>'form-control','id'=>'location')); ?>
                    <?php //echo $form->error($model,'location'); ?>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'desc'); ?>
                    <?php echo $form->textArea($model,'desc',array('rows'=>20, 'cols'=>50,'class'=>'form-control','id'=>'desc')); ?>
                    <?php //echo $form->error($model,'desc'); ?>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'isNews'); ?>
                    <?php
                    $options = array ('1' => 'Sim', '0' => 'Não');
                    echo $form->dropDownList($model, 'isNews', $options, array('class'=>'form-control','id'=>'isNews'));
                    ?>
                    <?php //echo $form->error($model,'isNews'); ?>
                </div>

            </div>

            <div class="row">
                <div class="col-lg-12">

                    <?php echo $form->labelEx($model,'imagens'); ?>
                    <?php
                   /* $this->widget('CMultiFileUpload', array(
                        'name' => 'files',
                        'id'=>'file_input',
                        'model'=> $model,
                        'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                        'duplicate' => 'Ficheiro duplicado!', // useful, i think
                        'denied' => 'Tipo de ficheiro inválido', // useful, i think
                    ));*/
                    //echo $form->fileField($model, 'imagens',array('id'=>'file_input','class'=>'multiple'));

                    ?>
                    <input type="file" name="imagens[]" id="file_input" class="multiple"/>
                    <div class="imgNote">(As imagens devem possuir uma resolução de 940x515px e tamanho máximo de 8MB)</div>
                    <?php //echo $form->error($model,'imagens'); ?>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 images_container">

                </div>
            </div>

            <div class="row buttons">
                <div class="col-lg-12">
                    <?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Guardar',array('class'=>'btn btn-success')); ?>
                    <?php echo CHtml::submitButton('Cancelar',array('class'=>'btn btn-danger','name'=>'cancelar','id'=>'cancelar')); ?>
                </div>
            </div>

            <?php $this->endWidget(); ?>


        </div><!-- form -->
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#file_input').multifile({
            container: ".images_container"
        })
    });
</script>

