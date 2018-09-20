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


//class of stock account
class stock_account
{
    protected $new;
   
    //function to show values of file
    function valueOf($total,$name)
    {
        echo"\n total value of " . $name . " in account=" . $total;
    }

    //function to buy shares
    function addShare($total,$add)
    {
        $this->new=$total+$add;
        echo"\n bought shares" . $add;
        echo"\n new account balance is=" . $this->new;
    }

    //function to sell shares
    function removeShare($total,$remove)
    {
        $this->new=$total-$remove;
        echo"\n sold shares " . $remove;
        echo"\n new account balance is=" . $this->new;
    }

    //function to return value which save in file
    function saveAccount()
    {
        return $this->new;
    }
}

//class for linked list
class ListNode
{
    public $data;
    public $next;
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
    public function readNode()
    {
        return $this->data;
    }
}

class LinkedList
{
    public $firstnode; 
    public $lastnode; 
    public $count;
    public function __construct()
    {
        $this->firstnode = null;
        $this->lastnode = null;
        $this->count = 0;
    }
    public function isEmpty()
    {
        return $this->$firstnode == null;
    }
    public function insertFirst($data)
    {
        $link = new ListNode($data);
        $link->next = $this->firstnode;
        $this->firstnode = &$link;
        if ($this->lastnode == null) 
        {
            $this->lastnode = &$link;
        }
        
        $this->count++; 
    }
    public function deleteNode1($key)
    {
        $current = $this->firstnode;
        $previous = $this->firstnode;

        while ($current->data != $key) {
            if ($current->next == null) {
                return 1;
            } else {
                $previous = $current;
                $current = $current->next;
            }
        }

        if ($current == $this->firstnode) {
            if ($this->count == 1) {
                $this->lastnode = $this->firstnode;
            }
            $this->firstnode = $this->firstnode->next;
        } else {
            if ($this->lastnode == $current) {
                $this->lastnode = $previous;
            }
            $previous->next = $current->next;
        }
        $this->count--;
        return 0;
    }

     public function insertLast($data)
    {
        if ($this->firstnode != null) {

            $link = new ListNode($data);
            $this->lastnode->next = $link;
            $link->next = null;
            $this->lastnode = &$link;
            $this->count++;
        } else {
            $this->insertFirst($data);
        }
    }
    public function readList()
    {
        $listData = array();
        $current = $this->firstnode;
        $i = 0;
        while ($current != null) {
            $listData[$i] = $current->readNode();
            $current = $current->next;
            $i++;
        }

        return $listData;
    }

    public function readListInList()
    {
        $current = $this->firstnode;
        while ($current != null) {
            echo $current->readNode() . " ";
            $current = $current->next;
        }
        echo "\n";
    }

    function size()
    {
        return $this->count;
    }
}


//stack by using linked list
class node2 {
	public $next;
    public $element;
}
class Stack1 {
	private $front=null;
    private $back=null;

function push($data){
    $old=$this->back;
    $this->back= new node2();
    $this->back->element=$data;
	if ($this->isEmpty()) {
		$this->front = $this->back;
	} else {
        $old->next = $this->back;
	}
	return true;

}

function pop() {
	if($this->isEmpty()) {
		return null;
	}
	$value = $this->front->element;
	$this->front = $this->front->next;
	return $value;
}

public function isEmpty()
{
    return $this->front == null;
}
}



//class for deck
class deck
{
    protected $deck=array();
    protected $n;
    function deckinitialize($SUITS,$RANKS)
    {
        $this->n = sizeOf($SUITS) *sizeOf($RANKS)-1;
        $this->deck = array($this->n);

        for($i = 0; $i < sizeOf($RANKS); $i++) {
            for ($j = 0; $j <sizeOf($SUITS); $j++) {
                $this->deck[sizeOf($SUITS)*$i + $j] = $RANKS[$i] . " of " . $SUITS[$j];
            }
        }
        return $this->deck;
    }

    function shuffle($deck)
    {
        for($i = 0; $i < $this->n; $i++) {
            $r = $i + floor(rand(0,1) * ($this->n-$i));
            $temp = $this->deck[$r];
            $this->deck[$r] = $this->deck[$i];
            $this->deck[$i] = $temp;
        }
        return $this->deck;
    }
}

//class for queue implemented by linked list
class node1  {
	public $next;
    public $key;
}
class queue1 {
	private $front = null;
    private $back = null;
    public $count=0;
 public function isEmpty()
    {
        return $this->front == null;
    }

function  Dqueue() {
	if ($this->isEmpty()) {
		return null;
	}
	$value = $this->front->key;
	$this->front = $this->front->next;
	return $value;
}
function  Enqueue($data) {
    $old= $this->back;
	$this->back = new node1();
    $this->back->key=$data;
	if ($this->isEmpty()) {
		$this->front =$this->back;
	} else {
		$old->next = $this->back;
    }
    $this->count++;
}

function size()
    {
        return $this->count;
    }
}


?>