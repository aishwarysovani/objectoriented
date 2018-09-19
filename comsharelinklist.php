<?php
include "utility.php";
$list= new LinkedList();
echo"company shares by link list";
echo"\n enter total number of shares you want to add:";
$n=checknum();
echo"\n enter choice where you want to add share: \n 1.to first 2.to last";
$choice=checknum();
switch($choice)
{
    case 1:for($i=0;$i<$n;$i++)
            {
            echo"\n enter " . $i . "th share value to insert share in list:";
            $data=checknum();
            $list->insertFirst($data);
            }
            break;
    case 2:for($i=0;$i<$n;$i++)
            {
            echo"\n enter " . $i . "th share value to insert share in list:";
            $data=checknum();
            $list->insertLast($data);
            }
            break;
    default:echo"\n enter any choice:";
            break;
}

$list->readListInList();

echo"\n enter share which you want to delete:";
$delete=checknum();
$list->deleteNode1($delete);
echo"\n after deletion of " . $delete . " share list is:";
$list->readListInList();

?>