<?php
interface IFileSystemComponent
{
    public function getName();

    public function getSize();
}

class File implements IFileSystemComponent
{
    private $name;
    private $size;
    public function __construct($name, $size)
    {
        $this->name = $name;
        $this->size = $size;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize()
    {
        return $this->size;
    }
}

class DirectoryClass implements IFileSystemComponent
{
    private $name;
    private $components = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function addComponent(IFileSystemComponent $component): void
    {
        $this->components = $component;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSize(): int
    {
        $size = 0;
        foreach ($this->components as $component)
        {
            $size += $component->getSize();
        }
        return $size;
    }
}

$file1 = new File("file1.txt", 100);
$file2 = new File("file2.txt", 200);

$directory = new DirectoryClass("Folder");
$directory->addComponent($file1);
$directory->addComponent($file2);
echo "Total size of directory '{$directory->getName()}': {$directory->getSize()} bytes\n";