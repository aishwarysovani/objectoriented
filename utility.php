<?php
//function for validate name input
function validatename()
{
    fscanf(STDIN,'%s',$str);
    if (!preg_match("/^[a-zA-Z ]*$/",$str)) 
    {
       
        echo 'Only letters and white space allowed';
        return validatename();

    }
    else
    {
        return $str;
    }
}

//function for number validation
function validatenum()
{
    fscanf(STDIN,'%d',$num);
    if (!preg_match('/^[0-9]*$/', $num))
    {
        echo 'enter only number ';
        return validatenum();

    }
    else
    {
        return $num;
    }
}

//function to check if input is string or not
function checkstring()
{
    fscanf(STDIN,'%s',$str);
    if (!filter_var($str, FILTER_VALIDATE_INT))
    {
        return $str;

    }
    else
    {
        echo 'enter only string ';
        return checkstring();
        
    }
}


//function for number validation
function checknum()
{
    fscanf(STDIN,'%d',$num);
    if (filter_var($num, FILTER_VALIDATE_INT))
    {
        return $num;

    }
    else
    {
        echo 'enter only number ';
        return checknum();
        
    }
}
?>