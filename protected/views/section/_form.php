<?php
/* @var $this SectionController */
/* @var $model Section */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'section-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'associatedCourseID'); ?>
        <?php $courses = Course::model()->findAll();
        $list = CHtml::listData($courses,
        'courseID', 'courseCode');
        echo $form->dropDownList($model, 'associatedCourseID',
            $list,
            array('empty' => 'Select a course'));
        ?>
		<?php echo $form->error($model,'associatedCourseID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'assignedProfessorID'); ?>
        <?php $users = User::model()->findAllByAttributes(array('roleID' => 'PROFESSOR'));
        $list = CHtml::listData($users,
            'userID', 'netName');
        echo $form->dropDownList($model, 'assignedProfessorID',
            $list,
            array('empty' => 'Select a Professor'));
        ?>
		<?php echo $form->error($model,'assignedProfessorID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'semester'); ?>
		<?php echo $form->textField($model,'semester',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'semester'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->