<?php

interface TextComponent {
    public function getContent(): string;
}

// concrete component
class PlainText implements TextComponent {
    private $content;

    public function __construct($content) {
        $this->content = $content;
    }

    public function getContent(): string {
        return $this->content;
    }
}

interface TextDecorator extends TextComponent {
    // No need to define getContent() method as it's inherited from TextComponent
}

//Concrete Decorators
class BoldDecorator implements TextDecorator
{
    private $textComponent;
    public function __construct(TextComponent $textComponent) {
        $this->textComponent = $textComponent;
    }

    public function getContent(): string {
        return '<b>' . $this->textComponent->getContent() . '</b>';
    }
}

class ItalicDecorator implements TextDecorator {
    private $textComponent;

    public function __construct(TextComponent $textComponent) {
        $this->textComponent = $textComponent;
    }

    public function getContent(): string {
        return '<i>' . $this->textComponent->getContent() . '</i>';
    }
}

$textComponent = new PlainText("This is a sample text.");

// Apply formatting options using decorators
$textComponent = new BoldDecorator($textComponent);
$textComponent = new ItalicDecorator($textComponent);

// Get the decorated content
echo $textComponent->getContent();