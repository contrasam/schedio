<?php
/**
 * Created by PhpStorm.
 * User: PradeepSamuel
 * Date: 17/11/13
 * Time: 6:05 PM
 */

class PreferenceForm extends CFormModel
{
    public $semester;
    public $dayM;
    public $dayT;
    public $dayW;
    public $dayR;
    public $dayF;
    public $dayS;
    public $dayU;
    public $fromTimeM;
    public $fromTimeT;
    public $fromTimeW;
    public $fromTimeR;
    public $fromTimeF;
    public $fromTimeS;
    public $fromTimeU;
    public $toTimeM;
    public $toTimeT;
    public $toTimeW;
    public $toTimeR;
    public $toTimeF;
    public $toTimeS;
    public $toTimeU;

    public function rules()
    {
        return array(
            array('semester, dayM, dayT, dayW, dayR, dayF, dayS, dayU, fromTimeM, fromTimeT, fromTimeW, fromTimeR, fromTimeF, fromTimeS, fromTimeU, toTimeM, toTimeT, toTimeW, toTimeR, toTimeF, toTimeS, toTimeU', 'required'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'semester'=>'Semester',
            'dayM' => 'MON',
            'dayT' => 'TUE',
            'dayW' => 'WED',
            'dayR' => 'THR',
            'dayF' => 'FRI',
            'dayS' => 'SAT',
            'dayU' => 'SUN',
        );
    }

} 