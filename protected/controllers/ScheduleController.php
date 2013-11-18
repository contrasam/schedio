<?php
/**
 * Created by PhpStorm.
 * User: PradeepSamuel
 * Date: 16/11/13
 * Time: 5:22 PM
 */

class ScheduleController extends Controller
{

    function actionIndex()
    {

        $model = new PreferenceForm();
        $data = Subsection::model()->findAll();

        $this->render('index', array(
            'model' => $model,
            'courses' => $data,
        ));
    }

    public function actionUpdateAjax()
    {

//        if (isset($_POST['PreferenceForm'])) {
//            $PreferenceForm = $_POST['PreferenceForm'];

            $response = Yii::app()->db->createCommand('CALL `getStudentEligibleCourse`(\'6934153\', \'2013\')');

            foreach ($response->queryAll() as $row) {
                $sections[] = Subsection::model()->findByPk($row['SubsectionID']);
            }

//        } else {
//            $sections = 'ERROR';
//        }
        $this->renderPartial('_ajaxCourses', array(
            'courses' => $sections
        ), false, true);
    }
} 