<?php
require_once 'functions/database.php';
require_once 'functions/Attendance.php';

$att = new Attendance($db);

if(isset($_REQUEST)){
    echo "<pre>" , print_r($_REQUEST,true) , "</pre>";
    extract($_REQUEST);
    $att->logInsertRequest(json_encode($_REQUEST));

    if(isset($classId) && isset($subjectId) && isset($teacherId) && isset($time) && isset($absentees)){
        if(!empty($classId) && !empty($subjectId) && !empty($teacherId) && !empty($time) && !empty($absentees)){
            //validation
            /* CHECK FOR ABSENTEE ARRAY(SORT) AND DUPLICACY ISSUE*/


            //validation ends
            pr($att->getByLectureId(5));


            $absentees = explode(",",$absentees);
            $time = "2015-04-09 00:00:00";
            echo $att->upload($classId,$subjectId,$teacherId,$time,$absentees);
        }
    }
}