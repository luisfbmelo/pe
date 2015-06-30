<?php
/* @var $this ProjectsController */
/* @var $model Projects */

$this->breadcrumbs=array(
	'Projetos'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'Gerir projetos', 'url'=>array('index')),
	array('label'=>'Criar projeto', 'url'=>array('create')),
	array('label'=>'Atualizar o projeto', 'url'=>array('update', 'id'=>$model->id_proj)),
	array('label'=>'Eliminar o projeto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_proj),'confirm'=>'Tem a certeza que pretende eliminar?')),
	//array('label'=>'Manage Projects', 'url'=>array('admin')),
);
?>

<h1>Editar projeto</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_proj',
		'title',
		'author',
		'year',
		'location',
		'user_id',
		'desc',
		'dateCreated',
		'isNews',
	),
)); ?>
