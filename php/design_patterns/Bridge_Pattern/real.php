<?php
interface WebPageRenderer {
    public function renderPage($content);
}

// Implementor: UI Framework
interface UIFramework {
    public function render($content);
}

// Concrete Implementor 1
class BootstrapUI implements UIFramework
{
    public function render($content)
    {
        echo "<div class='container'>$content</div>\n";
    }
}

// Concrete Implementor 2
class MaterializeUI implements UIFramework
{
    public function render($content) {
        echo "<div class='container'>$content</div>\n";
    }
}

class WebPage implements WebPageRenderer
{
    protected $uiFramework;
    public function __construct(UIFramework $UIFramework)
    {
        $this->uiFramework = $UIFramework;
    }

    public function renderPage($content)
    {
        $this->uiFramework->render($content);
    }
}

$bootstrap = new BootstrapUI();
$page = new WebPage($bootstrap);
$page->renderPage("<h1>Hello, John Wick!</h1>");