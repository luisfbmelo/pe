<?php
/* @var $this ContatosController */

$this->pageTitle=Yii::app()->name.' - Contatos';
?>

    <div class="container-fluid mapBox">
        <div class="row">
            <div class="col-lg-12 pagTitle">
                CONTATOS
            </div>
        </div>

        <div class="row mapRow">
            <div class="col-lg-12">
                <div class="map">
                    <iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.pt/maps?f=d&amp;source=s_d&amp;saddr=38.655819,-27.225567&amp;daddr=&amp;hl=pt-PT&amp;geocode=&amp;sll=38.656001,-27.225628&amp;sspn=0.001887,0.004128&amp;t=m&amp;mra=mift&amp;mrsp=0&amp;sz=19&amp;ie=UTF8&amp;ll=38.656001,-27.225628&amp;spn=0.001887,0.004128&amp;output=embed"></iframe>

                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid contacts">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="contactBox">
                        <h1>Escreva para</h1>
                        <p>P.E - Projectos de Engenharia, Lda.<br/>
                            Av. Ten-Cor. José Agostinho, 2º- 25A<br/>
                            9700-108 Angra do Heroísmo</p>
                    </div>
                    <div class="contactBox">
                        <h1>A gerência</h1>
                        <ul>
                            <li>Engº Marco Poim</li>
                            <li>Engº Helena Vargas</li>
                            <li>Engº Haiane Madeira</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="contactBox">
                        <h1>E-mail</h1>
                        <p>p.e@mail.telepac.pt</p>
                    </div>

                    <div class="contactBox">
                        <h1>Telefone</h1>
                        <p>295 217 042</p>
                    </div>

                    <div class="contactBox">
                        <h1>Fax</h1>
                        <p>295 216 391</p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="contactBox">
                        <h1>Contate-nos</h1>

                        <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'contact-form',
                            'enableAjaxValidation'=>true,
                            'htmlOptions'=>array(
                                'role'=>'form',
                            )
                        )); ?>


                            <div class="form-group">
                            <?php echo $form->textField($model,'name',array('class'=>'form-control','id'=>'name','placeholder'=>'Nome')); ?>
                            <?php echo $form->error($model,'name'); ?>
                            </div>

                            <div class="form-group">
                            <?php echo $form->textField($model,'email',array('class'=>'form-control','id'=>'email','placeholder'=>'E-mail')); ?>
                            <?php echo $form->error($model,'email'); ?>
                            </div>

                            <div class="form-group">
                            <?php echo $form->textArea($model,'body',array('rows'=>15,'class'=>'form-control','id'=>'message','placeholder'=>'A sua mensagem...')); ?>
                            <?php echo $form->error($model,'body'); ?>
                            </div>

                            <?php echo CHtml::submitButton('Enviar',array('class'=>'btn btn-default')); ?>
                        <?php $this->endWidget(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
