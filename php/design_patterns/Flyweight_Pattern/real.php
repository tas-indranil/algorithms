<?php

interface TextFormatting
{
    public function format(string $text): string;
}


class TextFormattingFlyweight implements TextFormatting
{
    private $format;
    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function format(string $text): string
    {
        return "<{$this->format}>" . $text . "</{$this->format}>";
    }
}

// Flyweight Factory
class TextFormattingFactory
{
    private $flyweights = [];

    public function getFlyweight(string $format): TextFormatting
    {
        if(!isset($this->flyweights[$format]))
        {
            $this->flyweights[$format] = new TextFormattingFlyweight($format);
        }
        return $this->flyweights[$format];
    }
}

// Client code
class Document
{
    private $content = '';
    private $textFormattingFactory;

    public function __construct(TextFormattingFactory $textFormattingFactory)
    {
        $this->textFormattingFactory = $textFormattingFactory;
    }

    public function addText(string $text, string $format = null)
    {
        if($format)
        {
            $textFormatter = $this->textFormattingFactory->getFlyweight($format);
            $this->content .= $textFormatter->format($text);
        }else{
            $this->content .= $text;
        }
    }

    public function getContent(): string
    {
        return $this->content;
    }
}

// Usage
$textFormattingFactory = new TextFormattingFactory();

$document1 = new Document($textFormattingFactory);
$document2 = new Document($textFormattingFactory);

// Add text with formatting to documents
$document1->addText('This is bold text.', 'b');
$document1->addText('This is italic text.', 'i');
$document1->addText('This is bold and italic text.', 'b');
$document1->addText('This is normal text.');

$document2->addText('This is bold text.', 'b');
$document2->addText('This is italic text.', 'i');
$document2->addText('This is bold and italic text.', 'b');
$document2->addText('This is normal text.');

echo "Document 1:\n" . $document1->getContent() . "\n\n";
echo "Document 2:\n" . $document2->getContent() . "\n";