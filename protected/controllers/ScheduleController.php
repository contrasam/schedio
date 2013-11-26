<?php
/**
 * Created by PhpStorm.
 * User: PradeepSamuel
 * Date: 16/11/13
 * Time: 5:22 PM
 */

class ScheduleController extends Controller
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
                'actions' => array('index', 'generateSchedule', 'updateAjax', 'registerSchedule'),
                'users' => array('@'),
                'roles' => array('STUDENT')
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    function actionIndex()
    {

        $model = new PreferenceForm();

        $response = Yii::app()->db->createCommand('CALL `simpleEligibleCourses`(\'' . Yii::app()->user->id . '\', \'2013\')');

        foreach ($response->queryAll() as $row) {
            $sections[] = Subsection::model()->findByAttributes(array(
                'SubsectionID' => $row['SubsectionID'],
            ));
        }

        $this->render('index', array(
            'model' => $model,
            'courses' => $sections,
            'sectionIDs' => '',
            'subSectionIDs' => '',
            'eligible' => '',
            'comparedRecords' => '',
            'status' => '',
        ));
    }


    public function actionUpdateAjax()
    {
        $sections = array();
        $filteredSections = array();
        $model = new PreferenceForm();
        $final = array();


        $model->attributes = Yii::app()->request->getPost('PreferenceForm');

        $response = Yii::app()->db->createCommand('CALL `simpleEligibleCourses`(\'' . Yii::app()->user->id . '\', \'2013\')');

        foreach ($response->queryAll() as $row) {
            $sections[] = Subsection::model()->findByAttributes(array(
                'SubsectionID' => $row['SubsectionID'],
            ));
        }


        foreach ($sections as $section) {

            if (isset($model->semester)) {
                if (($section->associatedSection->semester == $model->semester) && $model->dayM == '0' && $model->dayT == '0' && $model->dayW == '0' && $model->dayR == '0' && $model->dayF == '0' && $model->dayS == '0' && $model->dayU == '0') {
                    $filteredSections[] = $section;
                }
            }

            if (isset($model->semester)) {
                if ($section->associatedSection->semester == $model->semester) {
                    if ($model->dayM == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'MON') {
                                if (!empty($model->fromTimeM)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeM))) {
                                        if (!empty($model->toTimeM)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeM))) {
                                                $filteredSections[] = $section;
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayT == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'TUE') {
                                if (!empty($model->fromTimeT)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeT))) {
                                        if (!empty($model->toTimeT)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeT))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayW == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'WED') {
                                if (!empty($model->fromTimeW)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeW))) {
                                        if (!empty($model->toTimeW)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeW))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayR == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'THU') {
                                if (!empty($model->fromTimeR)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeR))) {
                                        if (!empty($model->toTimeR)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeR))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayF == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'FRI') {
                                if (!empty($model->fromTimeF)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeF))) {
                                        if (!empty($model->toTimeF)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeF))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayS == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'SAT') {
                                if (!empty($model->fromTimeS)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeS))) {
                                        if (!empty($model->toTimeS)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeS))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }

                    if ($model->dayU == '1') {
                        foreach ($sectionsTimes = Sectiontime::model()->findAllByAttributes(array('associatedSubSection' => $section->SubsectionID)) as $sectionTime) {
                            if ($sectionTime->day == 'SUN') {
                                if (!empty($model->fromTimeU)) {
                                    if ((date($sectionTime->fromTime) >= date($model->fromTimeU))) {
                                        if (!empty($model->toTimeM)) {
                                            if ((date($sectionTime->toTime) <= date($model->toTimeU))) {
                                                if (isset($model->semester)) {
                                                    if ($section->associatedSection->semester == $model->semester) {
                                                        $filteredSections[] = $section;
                                                    }
                                                }
                                            }
                                        } else {
                                            $filteredSections[] = $section;
                                        }
                                    }
                                } else {
                                    $filteredSections[] = $section;
                                }
                            }
                        }
                    }
                }
            }
        }


        if (isset($filteredSections)) {

            $filteredSections = array_unique($filteredSections, SORT_REGULAR);

            $this->renderPartial('_ajaxCourses', array(
                'courses' => $filteredSections,
            ), false, true);
        } else {
            $this->renderPartial('_ajaxCourses', array(
                'courses' => $sections,
            ), false, true);
        }
    }

    public function actionGenerateSchedule()
    {
        $sectionIDs = Yii::app()->request->getPost('SectionIDs');
        $subSectionIDs = Yii::app()->request->getPost('SubSectionIDs');
        $success = array();
        $error = array();
        $tempRecords = array();

        $sectionIDsArray = explode(",", $sectionIDs);
        $subSectionIDsArray = explode(",", $subSectionIDs);

        foreach ($sectionIDsArray as $sectionID) {
            $subSections[] = Subsection::model()->findByPk($sectionID);
        }

        foreach ($subSectionIDsArray as $sectionID) {
            $subSections[] = Subsection::model()->findByPk($sectionID);
        }

        $subSections = array_filter($subSections);
        $enrollments = Enrollment::model()->findAllByAttributes(array(
            'associatedStudentID' => Yii::app()->user->id,
        ));

        foreach ($subSections as $subSection) {
            $subSectionTimes[] = Sectiontime::model()->findByAttributes(array(
                'associatedSubSection' => $subSection->SubsectionID,
            ));
        }


        if (!(empty($enrollments))) {
            foreach ($enrollments as $enrollment) {
                $enrollmentTimes[] = Sectiontime::model()->findByAttributes(array(
                    'associatedSubSection' => $enrollment->associatedSubSectionID,
                ));
            }

            foreach ($subSectionTimes as $subSectionTime) {
                foreach ($enrollmentTimes as $enrollmentTime) {
                    if ($enrollmentTime->associatedSubSection0->associatedSectionID != $subSectionTime->associatedSubSection0->associatedSectionID) {
                        $overlapFrom = max($enrollmentTime->fromTime, $subSectionTime->fromTime);
                        $overlapTo = min($enrollmentTime->toTime, $subSectionTime->toTime);
                        $overlapSum = strtotime($overlapTo) - strtotime($overlapFrom);
                        if ($overlapSum > 15) {
                            $tempRecords[] = array(
                                'subSectionID' => $subSectionTime->associatedSubSection,
                                'ComparedSectionID' => $enrollmentTime->associatedSubSection,
                                'overlapStatus' => true,
                            );
                        } else if ($overlapSum <= 15) {
                            $tempRecords[] = array(
                                'subSectionID' => $subSectionTime->associatedSubSection,
                                'ComparedSectionID' => $enrollmentTime->associatedSubSection,
                                'overlapStatus' => false,
                            );
                        }
                    } else {
                        //Already registered for course message
                    }
                }
            }
        }


        foreach ($subSectionTimes as $subSectionTime) {
            foreach ($subSectionTimes as $enrollmentTime) {
                if (($enrollmentTime->associatedSubSection0->associatedSectionID != $subSectionTime->associatedSubSection0->associatedSectionID)) {
                    if (($enrollmentTime->day == $subSectionTime->day) && ($enrollmentTime->associatedSubSection0->associatedSection->semester == $subSectionTime->associatedSubSection0->associatedSection->semester)) {
                        $overlapFrom = max($enrollmentTime->fromTime, $subSectionTime->fromTime);
                        $overlapTo = min($enrollmentTime->toTime, $subSectionTime->toTime);
                        $overlapSum = strtotime($overlapTo) - strtotime($overlapFrom);
                    } else {
                        $overlapSum = 0;
                    }
                    if ($overlapSum > 15) {
                        $tempRecords[] = array(
                            'subSectionID' => $subSectionTime->associatedSubSection,
                            'ComparedSectionID' => $enrollmentTime->associatedSubSection,
                            'overlapStatus' => true,
                        );
                    } else if ($overlapSum <= 15) {
                        $tempRecords[] = array(
                            'subSectionID' => $subSectionTime->associatedSubSection,
                            'ComparedSectionID' => $enrollmentTime->associatedSubSection,
                            'overlapStatus' => false,
                        );
                    }
                }
            }
        }


        $tempRecords = array_filter($tempRecords);
        $tempRecords = array_unique($tempRecords, SORT_REGULAR);

        foreach ($tempRecords as $tempRecord) {
            if ($tempRecord['overlapStatus'] && !empty($tempRecord)) {
                $error[] = Subsection::model()->findByPk($tempRecord['subSectionID'])->SubsectionID;
            } else {
                $success[] = Subsection::model()->findByPk($tempRecord['subSectionID'])->SubsectionID;
            }
        }
        $this->renderPartial('_ajaxStatus', array(
            'sectionIDs' => $sectionIDs,
            'subSectionIDs' => $subSectionIDs,
            'eligible' => array_unique(array_diff($success, $error)),
            'comparedRecords' => $tempRecords,
        ), false, true);
    }

    public function actionRegisterSchedule()
    {
        $regSectionIDs = Yii::app()->request->getPost('regSectionIDs');

        $regSectionIDsArray = explode(",", $regSectionIDs);

        foreach ($regSectionIDsArray as $regSectionID) {
            $status = array();
            $subSection = Subsection::model()->findByPk($regSectionID);
            $enrollment = new Enrollment();
            $enrollment->associatedStudentID = Yii::app()->user->id;
            $enrollment->associatedSubSectionID = $regSectionID;
            $enrollment->associatedCourseID = Subsection::model()->findByPk($regSectionID)->associatedSection->associatedCourseID;
            $enrollment->status = "REGISTERED";
            if ($subSection->currentSectionSize < $subSection->sectionSize) {
                if ($enrollment->save()) {
                    $subSection->setAttribute('currentSectionSize', ($subSection->currentSectionSize + 1));
                    if ($subSection->save()) {
                        $status[] = "Registration: Successful";
                    } else {
                        $status[] = "Section Update: Failed";
                    }
                } else {
                    $status[] = "Registration: Failed";
                }
            }
        }
        $this->renderPartial('_ajaxRegister', array(
            'status' => array_unique(array_filter($status)),
        ), false, true);
    }
}