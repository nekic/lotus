<?php

/* layout.html */
class __TwigTemplate_bb4319e0a73200e8407a4065b656cfc9b122b16db20c8ce3592751400d1c8eaa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>Title</title>
</head>
<body>
<div class=\"content\">
    ";
        // line 9
        $this->displayBlock('content', $context, $blocks);
        // line 12
        echo "</div>
</body>
</html>";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  41 => 10,  38 => 9,  32 => 12,  30 => 9,  20 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <title>Title</title>*/
/* </head>*/
/* <body>*/
/* <div class="content">*/
/*     {% block content %}*/
/* */
/*     {% endblock %}*/
/* </div>*/
/* </body>*/
/* </html>*/
