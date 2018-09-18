<?php
include "utility.php";

//take inputs from user for name,fullname and mob.
echo "enter first name:";
$first_name=validatename();                      //function call for validation
echo"enter full name without space:";
$full_name=validatename();
echo"enter mobile number";
$mob_no=validatenum();
$date=date("d-m-y");                             //take system date
$sentenec=array();
$newsentence=array();

//open file where msg is store
$myfile = fopen("msg.txt", "r") or die("Unable to open file!");
$sentenec=fread($myfile,filesize("msg.txt"));
echo"\n original messege:";
print_r($sentenec);
$replace=array($first_name,$full_name,$mob_no,$date);
$previous=array("<<name>>","<<full name>>","xxxxxxxxxx","01/01/2016");
$newsentence=str_replace($previous,$replace,$sentenec);                  //function for replacing
echo"\n";
echo"\n after replaceing:\n";
print_r($newsentence);                            //print after replace

fclose($myfile);                                  //file close

?>