<?php
/**
 * addressbook contain name,address address field contains city,state,mob no and zip for perticular user
 * also have function for addressbook 1.add to 2.edit 3.sort 4.delete and 
 * 5.display whole data 
 */
include "utility.php";
$json = file_get_contents('adressbook.json');
$someArray = json_decode($json, true);
echo"enter your choice:\n1.add to addressbook \n2.edit addressbook \n3.sort addressbook \n4.delete from addressbook \n5.show addressbook";
$choice=checknum();
switch($choice)
{
    /**
     * case for add account to addressbook
    */
     case 1:echo"enter your name:";
            $name=checkstring();
            echo"enter your city:";
            $city=checkstring();
            echo"enter your state:";
            $state=checkstring();
            echo"enter your mob no:";
            $mob_no=checknum();
            echo"enter zip code:";
            $zip=checknum();

            $arr['name']=$name;
                $arr['address']['city']=$city;
                $arr['address']['state']=$state;
                $arr['address']['mob_no']=$mob_no;
                $arr['address']['zip']=$zip;
        
            array_push($someArray, $arr);                    
            $jsonData = json_encode($someArray);
            file_put_contents('adressbook.json', $jsonData);
            break;
    
    /**
     * case for edit account from addressbook
    */
     case 2:echo"enter name which you want to edit:";
            $name=checkstring();
            $json = json_decode($json, true);
            {
            for($i=0;$i<sizeof($json);$i++)
            {
            if($json[$i]['name']==$name)
            {
                echo"enter field name which you want to edit i.e.\n1.city \n2.state \n3.mob_no \n4.zip:";
                $new=checknum();
                update($new,$i);
                break;
            }
            }
            }
            break;

    /**
     * case for sort fields of addressbook according to name
    */
     case 3:$array=array();
            $temp=array();
            $array= json_decode($json, true);
            {
            for($i=0;$i<sizeof($array);$i++)
            {
                for($j=$i+1;$j<sizeof($array);$j++)
                {
                    if($array[$i]['name']>$array[$j]['name'])
                    {
                    $temp=$array[$i];
                    $array[$i]=$array[$j];
                    $array[$j]=$temp;
                    }
                }
            }
            }
            $jsonData = json_encode($array);
            file_put_contents('adressbook.json', $jsonData);
            break;
            
    /**
     * case to remove entry from addressbook
    */
     case 4:echo"enter name which you want to delete:";
            $name=checkstring();
            $json = json_decode($json, true);
            {
            for($i=0;$i<sizeof($json);$i++)
            {
            if($json[$i]['name']==$name)
            {
               deletefield($name,$i);
            }
            }
            }
            break;
    
    /**
     * case for display whole data of addressbook
    */
    case 5:$json=json_decode($json,true);
            {
            for($i=0;$i<sizeof($json);$i++)
            {
            echo "Name :". $json[$i]['name'] . "\n";
            echo "city:".$json[$i]['address']['city']."\n";
            echo "state:".$json[$i]['address']['state']."\n";
            echo "mob no:".$json[$i]['address']['mob_no']."\n";
            echo "zip:".$json[$i]['address']['zip']."\n";
            echo"\n";
            }
            }
            break;
    
    default:echo"you not choose any option";
            break;
}


/**
 * function for updateing entry of addressbook by taking name from user
*/
function update($new,$i)
{
    $json = file_get_contents('adressbook.json');
    $json=json_decode($json,true);
    switch($new)
    {
        case 1:echo"enter city to update:";
                $city=checkstring();
                $json[$i]['address']['city']=$city;
                $jsonData = json_encode($json);
                file_put_contents('adressbook.json', $jsonData);
                echo"city updated";
                break;

        case 2:echo"enter state to update:";
                $state=checkstring();
                $json[$i]['address']['state']=$state;
                $jsonData = json_encode($json);
                file_put_contents('adressbook.json', $jsonData);
                echo"state updated";
                break;

        case 3:echo"enter mob no to update:";
                $mob_no=checknum();
                $json[$i]['address']['mob_no']=$mob_no;
                $jsonData = json_encode($json);
                file_put_contents('adressbook.json', $jsonData);
                echo"mob no updated";
                break;

        case 4:echo"enter zip to update:";
                $zip=checknum();
                $json[$i]['address']['zip']=$zip;
                $jsonData = json_encode($json);
                file_put_contents('adressbook.json', $jsonData);
                echo"zip updated";
                break;
    }
}

//function for deleting entry of addressbook
function deletefield($name,$i)
{
    $json_array=array();
    $json = file_get_contents('adressbook.json');
    $json_array=json_decode($json,true);
    unset($json_array[$i]);
    $jsonData = json_encode($json_array);
    file_put_contents('adressbook.json', $jsonData);

}



/* [
    {
        "name": "sd",
        "address": {
            "city": "desfc",
            "state": "fv",
            "mob_no": 541,
            "zip": 5824
        }
    },
    {
        "name": "as",
        "address": {
            "city": "dfv",
            "state": "fvdf",
            "mob_no": 584,
            "zip": 524
        }
    },
    {
        "name": "gs",
        "address": {
            "city": "defcd",
            "state": "edfcd",
            "mob_no": 5641,
            "zip": 6524
        }
    }
]*/
?>