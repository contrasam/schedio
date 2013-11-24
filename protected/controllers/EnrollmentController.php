<?php

class EnrollmentController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl',
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                'actions' => array('index', 'delete', 'update'),
                'users' => array('@'),
                'roles' => array('STUDENT')
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $userId = Yii::app()->user->id;
        $enrollments = Enrollment::model()->findAllByAttributes(array('associatedStudentID' => $userId));

        $this->render('index', array(
            'enrollments' => $enrollments
        ));
    }

    public function actionDelete($id)
    {
        $model = Enrollment::model()->findByPk($id);
        $linkedEnrollments = Enrollment::model()->findAllByAttributes(array(
            'associatedStudentID' => $model->associatedStudentID,
        ));
        $subSection = Subsection::model()->findByPk($model->associatedSubSection->SubsectionID);
        $subSection->setAttribute('currentSectionSize', ($subSection->currentSectionSize - 1));
        $subSection->save();
        foreach ($linkedEnrollments as $enrollment) {
            if ($enrollment->associatedSubSection->associatedSection->sectionID == $model->associatedSubSection->associatedSection->sectionID) {
                $subSection = Subsection::model()->findByPk($enrollment->associatedSubSection->SubsectionID);
                $subSection->setAttribute('currentSectionSize', ($subSection->currentSectionSize - 1));
                $subSection->save();
                $enrollment->delete();
            }
        }
        $model->delete();

        $this->redirect('/schedio/index.php/enrollment/index');
    }

    public function actionUpdate($id)
    {
        $model = Enrollment::model()->findByPk($id);

        if (isset($_POST['Enrollment'])) {
            $model->attributes = $_POST['Enrollment'];
            if ($model->save())
                $this->redirect('/schedio/index.php/enrollment/index');
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    // Uncomment the following methods and override them if needed
    /*
    public function filters()
    {
        // return the filter configuration for this controller, e.g.:
        return array(
            'inlineFilterName',
            array(
                'class'=>'path.to.FilterClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }

    public function actions()
    {
        // return external action classes, e.g.:
        return array(
            'action1'=>'path.to.ActionClass',
            'action2'=>array(
                'class'=>'path.to.AnotherActionClass',
                'propertyName'=>'propertyValue',
            ),
        );
    }
    */
}