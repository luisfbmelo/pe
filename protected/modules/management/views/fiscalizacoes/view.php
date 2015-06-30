<?php
/* @var $this SupervisionController */
/* @var $model Supervision */

$this->breadcrumbs=array(
	'Supervisions'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Supervision', 'url'=>array('index')),
	array('label'=>'Create Supervision', 'url'=>array('create')),
	array('label'=>'Update Supervision', 'url'=>array('update', 'id'=>$model->id_sup)),
	array('label'=>'Delete Supervision', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_sup),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supervision', 'url'=>array('admin')),
);
?>

<h1>View Supervision #<?php echo $model->id_sup; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_sup',
		'title',
		'author',
		'year',
		'location',
		'desc',
		'dateCreated',
		'isNews',
		'user_id',
		'type',
	),
)); ?>
