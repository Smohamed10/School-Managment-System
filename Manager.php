<?php
include_once 'User.php';
include_once 'Course.php';
include_once 'Functions.php';
include_once 'Ido.php';
class manager extends user implements Ido
{
    public function add($thing) //Manager Add Course
    {
        $course=new course;
        $course=$thing;
        addcourse($course);

    }
    public function edit($thing) // Manager Edit Course info
    {
        $course=new course;
        $course=$thing;
        editcourse($course);

    }
    public function veiw($thing) // Manager Veiw Messages
    {
        veiwmessages($thing);
    }
    public function delete($thing) //manager delete course
    {
        $course=new course;
        $course=$thing;
        deletecourse($course);
    }
    public function approve($result) //manager Approve Grades course
    {
        approvegrade($result);
    }




}
?>