<?php
/**
 *  SplFixedArray - Fixed-Size Array
 */
//$fixedArray = new SplFixedArray(3);
//$fixedArray[0] = 'First';
//$fixedArray[1] = 'Second';
//$fixedArray[2] = 'Third';
//
//try{
//    foreach ($fixedArray as $value) {
//        echo $value . "\n";
//    }
//}catch (Exception $exception)
//{
//    echo $exception->getCode();
//}


/**
 * SplQueue - Queue
 */
//$queue = new SplQueue();
//$queue->enqueue("One");
//$queue->enqueue("Two");
//$queue->enqueue("Three");
//$queue->enqueue("Four");
//$queue->add(4, "hello");
//// clean while printing
//while (!$queue->isEmpty()) {
//    echo $queue->dequeue() . "\n";
//}

/**
 * SplStack - Stack
 */
//$stack = new SplStack();
//$stack->push('First');
//$stack->push('Second');
//$stack->push('Third');
//// clean while printing
//while (!$stack->isEmpty()) {
//    echo $stack->pop() . "\n";
//}

/**
 * SplDoublyLinkedList - Doubly Linked List
 */
//$doublyLinkedList = new SplDoublyLinkedList();
//
//$doublyLinkedList->push('First');
//$doublyLinkedList->push('Second');
//$doublyLinkedList->push('Third');
//
//$doublyLinkedList->rewind();
//while ($doublyLinkedList->valid()) {
//    echo $doublyLinkedList->current() . "\n";
//    $doublyLinkedList->next();
//}

/**
 * heap
 */
//// Example of a max heap
//// Create a max heap instance
//$maxHeap = new SplMaxHeap();
//// Insert values into the heap
//$maxHeap->insert(3);
//$maxHeap->insert(1);
//$maxHeap->insert(5);
//$maxHeap->insert(9);
//$maxHeap->insert(10);
//$maxHeap->insert(14);
//$maxHeap->insert(4);
//$maxHeap->insert(2);
//// Iterate through the heap
//foreach ($maxHeap as $value) {
//    echo $value . "\n";
//}


$doublyLinkedList = new SplDoublyLinkedList();

$doublyLinkedList->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO | SplDoublyLinkedList::IT_MODE_DELETE);

$doublyLinkedList->push('Apple');
$doublyLinkedList->push('Banana');
$doublyLinkedList->push('Cherry');

// Print elements in reverse order (LIFO) and delete them
foreach ($doublyLinkedList as $element) {
    echo $element . "\n";
}


$doublyLinkedList = new SplDoublyLinkedList();

$doublyLinkedList->push('1');
$doublyLinkedList->push('2');
$doublyLinkedList->push('3');

// Reverse the order of elements
$doublyLinkedList->setIteratorMode(SplDoublyLinkedList::IT_MODE_LIFO);
$doublyLinkedList->rewind();
$doublyLinkedList->next();

// Print elements in reversed order
while ($doublyLinkedList->valid()) {
    echo $doublyLinkedList->current() . "\n";
    $doublyLinkedList->next();
}

