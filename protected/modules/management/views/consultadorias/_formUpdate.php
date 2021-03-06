<?php
/* @var $this ProjectsController */
/* @var $model Projects */
/* @var $form CActiveForm */
?>


<div class="row">
    <div class="col-lg-12">
        <div class="form">

            <?php $form=$this->beginWidget('CActiveForm', array(
                'id'=>'consulting',
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

            <div class="row">
                <div class="col-lg-12">
                    <?php echo $form->labelEx($model,'author'); ?>
                    <?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>255,'class'=>'form-control','id'=>'author')); ?>
                    <?php //echo $form->error($model,'author'); ?>
                </div>

            </div>

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


        $('.oldRemove').click(function(){
            if ($(".uploaded_image").length>1){
                if(confirm("Deseja realmente excluir este item?"))
                {
                    var thisObj = $(this);
                    var idRemove = $(this).attr("id");
                    $(".hiddenHouse").append('<input type="hidden" value="'+idRemove+'" name="total[]" class="placeholder"/>');
                    thisObj.parent().remove();
                }
            }else{
                alert("Deve possuir pelo menos uma fotografia para eliminar as restantes.");
            }

            /*var thisObj = $(this);
            var idRemove = $(this).attr("id");
            var imgName = $(this).parent().find('.filename').html();
            var urlBase = '<?php echo Yii::app()->request->baseUrl;?>';
            var dataMod = <?php echo $model->id_con;?>;
            var urlDest = urlBase+'/management/Projimg/delete';

            if ($(".uploaded_image").length>1){
                if (idRemove){
                    if(confirm("Deseja realmente excluir este item?"))
                    {
                        $.ajax({
                            url: urlDest,
                            type:"POST",
                            dataType: 'json',
                            data:{ img: parseInt(idRemove),name:imgName,mod:dataMod},
                            success: function(data){

                                if (data=="done"){
                                    thisObj.parent().remove();
                                    var totalImg = $("#total").val();
                                    $("#total").val(totalImg-1);
                                }
                            },
                            error: function(){

                            }
                        });
                    }
                }
            }else{
                alert("Deve possuir pelo menos uma fotografia para eliminar as restantes.");
            }*/
        });
    });
</script>

