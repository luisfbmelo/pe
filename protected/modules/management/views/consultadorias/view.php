<?php
/* @var $this ConsultingController */
/* @var $model Consulting */

$this->breadcrumbs=array(
	'Consultings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Consulting', 'url'=>array('index')),
	array('label'=>'Create Consulting', 'url'=>array('create')),
	array('label'=>'Update Consulting', 'url'=>array('update', 'id'=>$model->id_con)),
	array('label'=>'Delete Consulting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_con),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Consulting', 'url'=>array('admin')),
);
?>

<h1>View Consulting #<?php echo $model->id_con; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_con',
		'title',
		'author',
		'desc',
		'location',
		'year',
		'dateCreated',
		'user_id',
		'isNews',
		'type',
	),
)); ?>
