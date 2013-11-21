<div class="preference_form">
    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <?php echo $form->errorSummary($model); ?>


    <div class="row">
        <?php $timeArray = array('10:15:00' => '10:15:00', '10:30:00' => '10:30:00', '10:45:00' => '10:45:00', '11:00:00' => '11:00:00', '11:15:00' => '11:15:00', '11:30:00' => '11:30:00', '11:45:00' => '11:45:00', '12:00:00' => '12:00:00', '12:15:00' => '12:15:00', '12:30:00' => '12:30:00', '12:45:00' => '12:45:00', '13:00:00' => '13:00:00', '13:15:00' => '13:15:00', '13:30:00' => '13:30:00', '13:45:00' => '13:45:00', '14:00:00' => '14:00:00', '14:15:00' => '14:15:00', '14:30:00' => '14:30:00', '14:45:00' => '14:45:00', '15:00:00' => '15:00:00', '15:15:00' => '15:15:00', '15:30:00' => '15:30:00', '15:45:00' => '15:45:00', '16:00:00' => '16:00:00', '16:15:00' => '16:15:00', '16:30:00' => '16:30:00', '16:45:00' => '16:45:00', '17:00:00' => '17:00:00', '17:15:00' => '17:15:00', '17:30:00' => '17:30:00', '17:45:00' => '17:45:00', '18:00:00' => '18:00:00', '18:15:00' => '18:15:00', '18:30:00' => '18:30:00', '18:45:00' => '18:45:00', '19:00:00' => '19:00:00', '19:15:00' => '19:15:00', '19:30:00' => '19:30:00', '19:45:00' => '19:45:00', '20:00:00' => '20:00:00', '20:15:00' => '20:15:00'); ?>
        <?php echo $form->label($model, 'semester'); ?>
        <?php echo $form->dropDownList($model, 'semester', array(
            'FALL' => 'Fall',
            'WINTER' => 'Winter',
            'SUMMER' => 'Summer'
        ), array('empty' => '(Select a semester)'));
        ?>
    </div>
    <br/>

    <div class="row">
        <h5>Select Days & Time</h5>
        <table id="days-map">
            <thead>
            <th><?php echo $form->label($model, 'dayM'); ?></th>
            <th><?php echo $form->label($model, 'dayT'); ?></th>
            <th><?php echo $form->label($model, 'dayW'); ?></th>
            <th><?php echo $form->label($model, 'dayR'); ?></th>
            <th><?php echo $form->label($model, 'dayF'); ?></th>
            <th><?php echo $form->label($model, 'dayS'); ?></th>
            <th><?php echo $form->label($model, 'dayU'); ?></th>
            </thead>
            <tbody>
            <tr>
                <td>
                    <?php echo $form->checkBox($model, 'dayM') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeM', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeM', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayT') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeT', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeT', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayW') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeW', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeW', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayR') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeR', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeR', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayF') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeF', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeF', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayS') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeS', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeS', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
                <td>
                    <?php echo $form->checkBox($model, 'dayU') ?>&nbsp;&nbsp;&nbsp;
                    <br/>from Time: <br/><?php echo $form->dropDownList($model, 'fromTimeU', $timeArray, array('empty' => '(Select a time)')); ?>
                    <br/>to Time: <br/><?php echo $form->dropDownList($model, 'toTimeU', $timeArray, array('empty' => '(Select a time)')); ?>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="row buttons">
        <?php echo CHtml::Button('Search', array('onclick' => 'send()')); ?>
    </div>

    <?php $this->endWidget(); ?>
</div>