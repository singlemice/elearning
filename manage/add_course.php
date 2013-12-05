<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" ><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
        function IsNum(num){
            var reNum=/^\d+(\.\d+)?$/;
            return(reNum.test(num));
        }
        function checkf_grade()
        {
            if(document.f_grade.gradename.value == "") {
                alert("班级不能为空");
                document.f_grade.gradename.focus();
                return false;
            }
            if (document.f_grade.year.value.length =="") {
                alert("年度不能为空");
                document.f_grade.year.focus();
                return false;
            }
        }
        function checkf_course()
        {
            if (document.f_course.course.value.length =="") {
                alert("课程不能为空");
                document.f_course.course.focus();
                return false;
            }
            if(document.f_course.course_num.value == "") {
                alert("课程代码不能为空");
                document.f_course.course_num.focus();
                return false;
            }
            
            if(document.f_course.time.value == "") {
                alert("学时不能为空");
                document.f_course.time.focus();
                return false;
            }

            if(!IsNum(document.f_course.time.value )) {
                alert("学时必须为数字");
                document.f_course.time.focus();
                return false;
            }
            if (document.f_course.teacher.value.length =="") {
                alert("课程讲师不能为空");
                document.f_course.teacher.focus();
                return false;
            }
        }
        </script>
</head>
<?php
require_once(dirname(dirname(__FILE__)).'/function/ClassDataBase.php') ;
require_once(dirname(dirname(__FILE__)).'/function/function.php') ;
$action=$_REQUEST['flag'];
?>
<body>

<div class="container" >
  <?php
  if($action=='course')
  {
  ?>
  <form name="f_course" method="post" action="process_post.php" onsubmit="return checkf_course();" >
  <ul>
  <li><div class="label" >课程名：</div><div class="input" ><input name="course" type="text" width="100px" maxlength="240px" /></div></li>
  <li><div class="label" >班级：</div><div class="input" ><select name="classname" > 
  <?php
    $cdb=new ClassDataBase();
    $sql='select id,gradename,year from grades;';
    $results=$cdb->QuerySQL($sql);
    foreach ($results as $key ) {
      echo '<option value="'.$key['id'].'" >'.$key['year'].$key['gradename']."</option>";
    }
  ?>
					</select></div></li>
  <li><div class="label" >课程属性：</div><div class="input" >
  <select name="course_pro" > 
					  <option value="1" >必修课</option>
					  <option value="2" >选修课</option>
					</select></div></li>
  <li><div class="label" >课程代码：</div><div class="input" ><input name="course_num" type="text" width="100px" maxlength="240px" /></div></li>


  <li><div class="label" >学时：</div><div class="input" ><input name="time" type="text" width="100px" maxlength="240px" /></div></li>
  <li><div class="label" >课程讲师：</div><div class="input" ><input name="teacher" type="text" width="100px" maxlength="240px" /></div></li>
  <li><div class="label" >开始时间：</div><div class="input" ><?php DateSelector("start_time"); ?></div></li>
  <li><div class="label" >结束时间：</div><div class="input" ><?php DateSelector("end_time"); ?></div></li>
  

<li><div class="label" ><input type="submit" value="提交" /></div><div class="input" ><input type="reset" value="重置" /></div></li>

  </ul>
<input type="hidden" name="action" value="post_course_info" />
  </form>

<?php
}
elseif($action=='grades')
{
?>
 <form name="f_grade" method="post" action="process_post.php" onsubmit="return checkf_grade();" >
  <ul>
  <li><div class="label" >班级：</div><div class="input" ><input name="gradename" type="text" width="100px" maxlength="240px" /></div></li>
  
  <li><div class="label" >年度：</div><div class="input" ><input name="year" type="text" width="100px" maxlength="240px" /></div></li>
  
<li><div class="label" ><input type="submit" value="提交" /></div><div class="input" ><input type="reset" value="重置" /></div></li>

  </ul>
   <input type="hidden" name="action" value="post_grades_info" />
  </form>
<?php
}
?>
</div>


</body></html>