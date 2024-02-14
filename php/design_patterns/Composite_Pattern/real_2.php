<?php
// Component interface
interface OrganizationalComponent {
    public function getName();
    public function getSalary();
}

// Leaf: Employee
class Employee implements OrganizationalComponent {
    private $name;
    private $salary;

    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }
}

// Composite: Department
class Department implements OrganizationalComponent {
    private $name;
    private $components = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addComponent(OrganizationalComponent $component) {
        $this->components[] = $component;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        $totalSalary = 0;
        foreach ($this->components as $component) {
            $totalSalary += $component->getSalary();
        }
        return $totalSalary;
    }
}

// Client code
$employee1 = new Employee("John", 5000);
$employee2 = new Employee("Alice", 6000);

$department = new Department("Sales");
$department->addComponent($employee1);
$department->addComponent($employee2);

echo "Total salary of department '{$department->getName()}': {$department->getSalary()} USD\n";
