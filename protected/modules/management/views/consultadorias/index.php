<?php
/* @var $this ConsultingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
    'Consultadorias',
);
?>

<?php
$this->menu=array(
    array('label'=>'Criar consultadoria', 'url'=>array('create')),
    //array('label'=>'Gerir projetos', 'url'=>array('admin')),
);
?>

<!--ACTION MESSAGES-->
<?php if(Yii::app()->user->hasFlash('addedCon')): ?>
    <div class="statusBox">
        <div class="statusMessage flash-success">
            <?php echo Yii::app()->user->getFlash('addedCon'); ?>
        </div>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('updatedCon')): ?>
    <div class="statusBox">
        <div class="statusMessage flash-success">
            <?php echo Yii::app()->user->getFlash('updatedCon'); ?>
        </div>
    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('deleteCon')): ?>
    <div class="statusBox">
        <div class="statusMessage flash-success">
            <?php echo Yii::app()->user->getFlash('deleteCon'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="statusBox ajaxMes">
    <div class="statusMessage flash-success">
        Consultadoria eliminada com sucesso.
    </div>
</div>
<!--END ACTION MESSAGES-->


<div class="pagTitle">
    Listagem de consultadorias
</div>

<!--DELETE BUTTON-->
<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/consultadorias/create" class="btn btn-success createBtn">Criar novo</a>

<input type="button" value="Eliminar" class="btn btn-danger deleteBtn"/>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'summaryText'=>'',
    'ajaxUpdate'=>false,
    'id'=>'consulting-grid',
    'dataProvider'=>$dataProvider,
    'cssFile' => Yii::app()->request->baseUrl.'/css/gridViewStyle/gridView.css',

    //all rows are selectable
    'selectableRows' => 2,

    //paginator class
    'pagerCssClass' => 'pagElements',

    //pagination
    'pager' => array(
        'header' => '',
        'prevPageLabel' => '« Anterior',
        'nextPageLabel' => 'Seguinte »',
        'firstPageLabel'=>'',
        'lastPageLabel'=>'',
        'footer'=>'',//defalut empty
        'maxButtonCount'=>10, // defalut 10

        //paginator class for bootstrap
        'htmlOptions' => array('class' => 'pagination pagination-sm',),

        //current element class for bootstrap
        'selectedPageCssClass'=>'active',//default "selected"
    ),

    'columns'=>array(
        //checkboxes for delete
        array(
            'id'=>'autoId',
            'class'=>'CCheckBoxColumn',
            'checkBoxHtmlOptions' => array("name" => "idList[]"),
        ),

        //'id_proj',
        'title',
        'year',
        'dateCreated',
        array(
            'name'=>'Destaque',
            'header'=>'Destaque',
            'filter'=>array('1'=>'Yes','0'=>'No'),
            'value'=>'($data->isNews=="1")?("Sim"):("Não")'
        ),
        /*
        'desc',
        'dateCreated',
        'isNews',
*/
        //action buttons
        array('class'=>'CButtonColumn',
            'template'=>'{update} {delete}',
            'buttons'=>array (
                /*'view'=>array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array( 'class'=>'glyphicon glyphicon-eye-open actionBtn' ),
                ),*/
                'update'=> array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array( 'class'=>'glyphicon glyphicon-edit actionBtn' ),
                ),
                'delete'=>array(
                    'label'=>'',
                    'imageUrl'=>'',
                    'options'=>array( 'class'=>'glyphicon glyphicon-trash actionBtn' ),
                ),
            ),
        ),

    ))); ?>

<script>
    $(document).ready(function(){
        $(".deleteBtn").click(function(){
            var urlBase = '<?php echo Yii::app()->request->baseUrl;?>';
            var urlDest = urlBase+'/management/consultadorias/delete';

            //get all selected elements
            var idList = $('input[type=checkbox]:checked').map(function () {
                return $(this).val();
            }).get();
            //var idList = $("input[type=checkbox]:checked").val();

            //if exists

            if(idList!="")
            {
                if(confirm("Deseja realmente excluir este item?"))
                {
                    $.ajax({
                        url: urlDest,
                        type:"POST",
                        dataType: 'json',
                        data:{ list: idList},
                        success: function(data){
                            if (data=="done"){
                                $(".ajaxMes").css("display","block");
                                $(".ajaxMes").delay(2000).fadeOut(500,function(){
                                    window.location = window.location.href;
                                });
                            }
                        },
                        error: function(){

                        }
                    });
                }
            }
        });
    });
</script>