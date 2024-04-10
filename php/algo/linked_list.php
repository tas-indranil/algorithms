<?php
require_once 'vendor/autoload.php';
use Symfony\Component\VarDumper\VarDumper;
class Node
{
    public $data; // data stored in the node
    public $next; // Reference to the next node

    // to initialize the node with data
    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

// class to represent the linked list
class LinkedList
{
    private $head; // Reference to the first node in the list

    // empty list initialize
    public function __construct()
    {
        $this->head = null;
    }

    //insert a new node at the beginning of the list
    public function insert($data): void
    {
        $newNode = new Node($data); // create a new node
        $newNode->next = $this->head; // set the next of the new node to the current head
        $this->head = $newNode; // set the new node as the head of the lsit
    }

    // display the contents of the list
    public function display(): void
    {
        $current = $this->head; // start from the head of the list
        while ($current !== null)
        {
            echo $current->data." "; // Print the data of the current node
            $current = $current->next; // move to the next node
        }
    }
}

$list = new LinkedList();

// Insert some elements into the list
$list->insert(3);
$list->insert(7);
$list->insert(11);
dump($list);
echo "\n\n\n";
// Display the contents of the list
echo "Contents of the linked list: ";
$list->display();