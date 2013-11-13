<?php
/* @var $this EnrollmentController */

$this->breadcrumbs=array(
    'Enrollment',
);
?>

<h1>Update Section <?php echo $model->associateSection->associatedSection0->associatedCourse->courseCode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>