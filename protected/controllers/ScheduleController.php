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
            'sectionIDs' => '',
        ));
    }


    public function actionUpdateAjax()
    {
        $sections = array();
        $filteredSections = array();
        $model = new PreferenceForm();
        $final = array();


        $model->attributes = Yii::app()->request->getPost('PreferenceForm');

        $response = Yii::app()->db->createCommand('CALL `getStudentEligibleCourse`(\'6934153\', \'2013\')');

        foreach ($response->queryAll() as $row) {
            $sections[] = Subsection::model()->findByPk($row['SubsectionID']);
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
        $SuccessLog = array();
        $errorLog = array();

        $sectionIDsArray = explode(",", $sectionIDs);

        foreach ($sectionIDsArray as $sectionID) {
            $subSections[] = Subsection::model()->findByAttributes(array(
                'associatedSectionID' => Subsection::model()->findByPk($sectionID)->associatedSectionID,
            ));
        }

        $subSections = array_filter($subSections);
        $enrollments = Enrollment::model()->findAllByAttributes(array(
            'associatedStudentID' => '6934153',
        ));

        $overlapSum = 0;

        foreach ($subSections as $subSection) {
            $sectionTimes = Sectiontime::model()->findAllByAttributes(array(
                'associatedSubSection' => $subSection->SubsectionID,
            ));
            if (!(empty($enrollments))) {
                foreach ($enrollments as $enrollment) {
                    $enrollmentTimes = Sectiontime::model()->findAllByAttributes(array(
                        'associatedSubSection' => $enrollment->associatedSubSection->SubsectionID,
                    ));
                }

                foreach ($enrollmentTimes as $enrollmentTime) {
                    foreach ($sectionTimes as $sectionTime) {
                        $overlapFrom = max($enrollmentTime->fromTime, $sectionTime->fromTime);
                        $overlapTo = min($enrollmentTime->toTime, $sectionTime->toTime);
                        $overlapSum += strtotime($overlapTo) - strtotime($overlapFrom);
                        var_dump($overlapSum);
                    }

                    if ($overlapSum > 15) {
                        $errorLog[] = "Time overlap Between " . $subSection->associatedSection->associatedCourse->courseCode . " and " . $enrollmentTime->associatedSubSection0->associatedSection->associatedCourse->courseCode;
                    } else if ($overlapSum <= 15) {
                        $SuccessLog[] = "Eligible to register for " . $subSection->associatedSection->associatedCourse->courseCode;
                    }
                }
            } else {

            }
        }

        var_dump(array_filter($errorLog));
        var_dump(array_filter($SuccessLog));


        $this->renderPartial('_ajaxStatus', array(
            'sectionIDs' => $sectionIDs
        ), false, true);
    }
} 