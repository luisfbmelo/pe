<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<div class="container-fluid projects minHeight indexMan">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 pagTitle">
                SISTEMA DE GESTÃO DE CONTEÚDO
                <p>PE - Projetos de Engenharia</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="projBox">
                    <div class="projTitle" style="border-bottom: 1px solid #aaa">
                        Projetos
                    </div>
                    <div class="projDetail">
                        <p><strong><?php echo $totalProj;?> projetos</strong></p>
                        <p>Nesta secção poderá criar, editar ou eliminar os projetos da empresa.</p>
                    </div>
                    <div class="projButtons">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/projetos/index" class="btn btn-primary createBtn">Gerir</a>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/projetos/create" class="btn btn-success createBtn">Novo</a>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="projBox">
                    <div class="projTitle" style="border-bottom: 1px solid #aaa">
                        Fiscalizações
                    </div>
                    <div class="projDetail">
                        <p><strong><?php echo $totalSup;?> fiscalizações</strong></p>
                        <p>Nesta secção poderá criar, editar ou eliminar as fiscalizações executadas pela empresa.</p>
                    </div>
                    <div class="projButtons">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/fiscalizacoes/index" class="btn btn-primary createBtn">Gerir</a>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/fiscalizacoes/create" class="btn btn-success createBtn">Nova</a>

                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="projBox">
                    <div class="projTitle" style="border-bottom: 1px solid #aaa">
                        Consultadorias
                    </div>
                    <div class="projDetail">
                        <p><strong><?php echo $totalCons;?> consultadorias</strong></p>
                        <p>Nesta secção poderá criar, editar ou eliminar as consultadorias executadas pela empresa.</p>
                    </div>
                    <div class="projButtons">
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/consultadorias/index" class="btn btn-primary createBtn">Gerir</a>
                        <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/management/consultadorias/create" class="btn btn-success createBtn">Nova</a>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
