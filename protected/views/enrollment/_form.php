<?php
/* @var $this CourseController */
/* @var $model Course */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enrollment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'associatedSubSectionID'); ?>
        <?php
        $sections = Subsection::model()->findAllByAttributes(array(
            'associatedSectionID' => $model->associatedSubSection->associatedSection->sectionID,
            'classType' => 'TUTO'
        ));
        $list = CHtml::listData($sections,'SubsectionID', 'sectionCode');
        ?>
		<?php echo $form->dropDownList($model,'associatedSubSectionID',$list); ?>
		<?php echo $form->error($model,'associatedSubSectionID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->