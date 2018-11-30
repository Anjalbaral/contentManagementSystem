<?php
 function check_query($query)
 {
   if(!$query)
   {
     die("database query cannot run and exicute");
   }
 }

function fetch_last_data($first)
{
  global $connection;

  $query = "SELECT * from blogdetails where id={$first}";
  $result = mysqli_query($connection,$query);
  check_query($result);
  if($data = mysqli_fetch_assoc($result))
  {
    return $data;
  }
  else
  {
    return "false";
  }
}
function fetch_second_last_data($second)
{
  global $connection;

  $query = "SELECT * from blogdetails where id={$second}";
  $result = mysqli_query($connection,$query);
  check_query($result);
  if($data = mysqli_fetch_assoc($result))
  {
    return $data;
  }
  else
  {
    return "false";
  }
}
function secure_input($value)
{
  global $connection;
  $string = mysqli_real_escape_string($connection,$value);
  return $string;
}
function select_all_from_subjects()
{
  global $connection;

  $query = "SELECT * FROM blogdetails";
  $result = mysqli_query($connection,$query);
  return $result;
}


function delete_blogContent_by_id($id)
{
  global $connection;
  
  $query = "DELETE from blogcontent where blogid={$id} ";
  $result = mysqli_query($connection,$query);
  return $result;
}
function delete_blogDetails_by_id($id)
{
  global $connection;

  $query = " DELETE from blogdetails where id={$id} ";
  $result = mysqli_query($connection,$query);
  return $result;
}

function secure_data_transfer($value)
{
  global $connection;
  $escaped_string = mysqli_real_escape_string($connection,$value);
  return $escaped_string;
}
function update_the_blogDetails($updateid,$bname)
{
  global $connection;
  
 $query = "UPDATE blogdetails set name ='$bname' where id = '$updateid' ";
 
 $result = mysqli_query($connection,$query);

  return $result;


}
function update_the_blogContent($updateid,$author,$text)
{
  global $connection;

  $query ="UPDATE blogcontent set blogtexts='$text',author='$author' where blogid='$updateid' ";
  $result = mysqli_query($connection,$query);
  return $result;

}
function redirect_to($new_location)
{
  header("Location: ".$new_location);
  exit;
} 


 function find_all_blogDetails()
 {
 	global $connection;
 	$query ="SELECT * from blogdetails order by id desc " ;
    $result = mysqli_query($connection,$query);
    check_query($result);
    return $result;
 }

 function find_present_blogDetails($presentid)
 {

   global $connection;
  $query ="SELECT * from blogdetails where id={$presentid}" ;
    $result = mysqli_query($connection,$query);
    check_query($result);
    return $result;

 }
 

 function find_subject_by_id($subject_id)
 {
 	global $connection;
    $safe_subject_id = mysqli_real_escape_string($connection,$subject_id);
 	$query ="SELECT * FROM blogdetails where id={$safe_subject_id}";
 	$result = mysqli_query($connection,$query);
 	check_query($result);
 	if($subject = mysqli_fetch_assoc($result))
 	 {
 	 	return $subject;
 	 }
 	else
 	{
 		return null;
 	}

 }

 function find_blogcontent_by_subjectid($subject_id)
 {
 	global $connection;
    $safe_subject_id = mysqli_real_escape_string($connection,$subject_id);
 	$query ="SELECT * FROM blogcontent where blogid={$safe_subject_id}";
 	$result = mysqli_query($connection,$query);
 	check_query($result);
 	if($page = mysqli_fetch_assoc($result))
 	 {
 	 	return $page;
 	 }
 	else
 	{
 		return null;
 	}
 }

 function find_subject_of_page($page_id)
 {
  global $connection;
   $safe_page_id = mysqli_real_escape_string($connection,$page_id);
  $query = "SELECT * FROM subjects where id =(SELECT id from pages where id={$safe_page_id})"; 
  $result = mysqli_query($connection,$query);
  if($page = mysqli_fetch_assoc($result))
  {
    return $page;
  }
  else
  {
    return null;
  }
 }

 ?>