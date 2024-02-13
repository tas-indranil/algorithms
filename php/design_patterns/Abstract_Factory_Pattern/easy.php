<?php

// Abstract factory interface
interface FurnitureFactory
{
    public function createChair(): Chair;
    public function createTable(): Table;
}

// Concrete Factory 1
class ModernFurnitureFactory implements FurnitureFactory
{

    public function createChair(): Chair
    {
        return new ModernChair();
    }

    public function createTable(): Table
    {
        return new ModernTable();
    }
}

// Concrete Factory 2
class VictorianFurnitureFactory implements FurnitureFactory {
    public function createChair(): Chair {
        return new VictorianChair();
    }

    public function createTable(): Table {
        return new VictorianTable();
    }
}

// Abstract Product: Chair
interface Chair {
    public function sitOn();
}

// Abstract Product: Table
interface Table {
    public function putOn();
}

class ModernChair implements Chair
{
    public function sitOn()
    {
        echo "Sitting on a modern chair.\n";
    }
}
class VictorianChair implements Chair {
    public function sitOn()
    {
        echo "Sitting on a Victorian chair.\n";
    }
}

class ModernTable implements Table {
    public function putOn() {
        echo "Putting something on a modern table.\n";
    }
}
class VictorianTable implements Table {
    public function putOn() {
        echo "Putting something on a Victorian table.\n";
    }
}

// Client code using the Abstract Factory Pattern
function clintCode(FurnitureFactory  $factory)
{
    $chair = $factory->createChair();
    $table = $factory->createTable();

    $chair->sitOn();
    $table->putOn();
}

clintCode(new ModernFurnitureFactory());
echo "\n";
clintCode(new VictorianFurnitureFactory());
