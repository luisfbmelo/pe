<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container-fluid projects minHeight">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <?php echo $content; ?>
            </div>
            <!--<div class="col-lg-2">
                <?php
                /*$this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Operações',
                ));
                $this->widget('zii.widgets.CMenu', array(
                    'items'=>$this->menu,
                    'htmlOptions'=>array('class'=>'operations'),
                ));
                $this->endWidget();*/
                ?>
            </div>-->
        </div>
    </div>
</div>

<?php $this->endContent(); ?>