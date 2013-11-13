<?php
/* @var $this SubsectionController */
/* @var $model Subsection */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subsection-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'associatedSection'); ?>
        <?php $sections = Section::model()->findAll();
        $list = CHtml::listData($sections,
            'sectionID', 'sectionID');
        echo $form->dropDownList($model, 'associatedSection',
            $list,
            array('empty' => 'Select a section'));
        ?>
		<?php echo $form->error($model,'associatedSection'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sectionCode'); ?>
		<?php echo $form->textField($model,'sectionCode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'sectionCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'classType'); ?>
		<?php echo $form->textField($model,'classType',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'classType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roomNumber'); ?>
		<?php echo $form->textField($model,'roomNumber'); ?>
		<?php echo $form->error($model,'roomNumber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'buildingCode'); ?>
		<?php echo $form->textField($model,'buildingCode',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'buildingCode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sectionSize'); ?>
		<?php echo $form->textField($model,'sectionSize'); ?>
		<?php echo $form->error($model,'sectionSize'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currentSectionSize'); ?>
		<?php echo $form->textField($model,'currentSectionSize'); ?>
		<?php echo $form->error($model,'currentSectionSize'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->