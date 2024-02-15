# Senario

Suppose you have a content management system where users can write articles with text content. Users should be able to apply various formatting options such as bold, italic, underline, and color to the text. Instead of directly modifying the text content with each formatting option, we can use the Decorator Pattern to dynamically add or remove these formatting options.


**Component Interface**: Define an interface TextComponent representing the basic functionality of text content.

**Concrete Component**: Implement the TextComponent interface with a concrete class PlainText representing plain text content.

**Decorator Interface**: Define a decorator interface TextDecorator extending the TextComponent interface. This interface will allow adding formatting options dynamically.

**Concrete Decorators**: Implement concrete decorators for each formatting option (e.g., BoldDecorator, ItalicDecorator, UnderlineDecorator, ColorDecorator). These decorators will add specific formatting options to the text content.

**Client Code**: Use the decorators to apply formatting options to the text content.
