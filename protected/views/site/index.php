<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

$user = User::model()->findByPk(Yii::app()->user->id);
?>

<h5>Welcome <?php if(!empty($user)) echo " " . $user->firstName ?></h5>
<p>Schedio is a course management system which can be used by students and professors to plan their courses semester
    wise.</p>

<p>You can login to the application by visiting the Login tab.</p>
<?php
if(!empty($user)){
    if($user->roleID == "STUDENT"){
        echo "<h6><a href='/schedio/index.php/enrollment/index' >My Schedule</a></h6><br/>";
        echo "<p>My schedule will list the courses you are enrolled in currently in and will also list the saved schedules that you had saved for future use.";
        echo " the my schedule section you can switch sections and drop courses as per your preferences.";
        echo "<h6><a href='/schedio/index.php/schedule/index' >Scheduler Planner</a></h6><br/>";
        echo "<p>Schedule Planner will help in planning a schedule without any time overlaps and register for a particular sequence od courses, the schedule planner is personalised such that your previously registered or enrolled courses will be taken into account automatically during the schedule planning process, even the courses lister for you will be based on the previous courses finished and the prerequisite conditions.</p>";
    }elseif($user->roleID == "PROFESSOR"){

    }elseif($user->roleID == "ADMIN"){

    }
}
?>


