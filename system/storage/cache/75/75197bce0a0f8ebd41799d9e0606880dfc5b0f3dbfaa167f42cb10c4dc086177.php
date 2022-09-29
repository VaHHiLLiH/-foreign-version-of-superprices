<?php

/* nice/template/common/language.twig */
class __TwigTemplate_af574b370d6a46a851240a96f7ca67781753572949c732315e5ac8ab617ff6ba extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        if ((twig_length_filter($this->env, (isset($context["languages"]) ? $context["languages"] : null)) > 1)) {
            // line 2
            echo "<div class=\"top-buttons--item\">
  <form action=\"";
            // line 3
            echo (isset($context["action"]) ? $context["action"] : null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-language\">
    <div class=\"btn-group\">
      <button class=\"btn btn-link dropdown-toggle\" data-toggle=\"dropdown\">";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 7
                if (($this->getAttribute($context["language"], "code", array()) == (isset($context["code"]) ? $context["code"] : null))) {
                    echo " 
      <img src=\"catalog/language/";
                    // line 8
                    echo $this->getAttribute($context["language"], "code", array());
                    echo "/";
                    echo $this->getAttribute($context["language"], "code", array());
                    echo ".png\" alt=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\" title=\"";
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "\">
      <span class=\"\">";
                    // line 9
                    echo $this->getAttribute($context["language"], "name", array());
                    echo "</span>&nbsp;<i class=\"fa fa-caret-down\"></i>";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 15
            echo "      </button>
      <ul class=\"dropdown-menu\">";
            // line 17
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 18
                echo "        <li>
          <button class=\"btn btn-link btn-block language-select\" type=\"button\" name=\"";
                // line 19
                echo $this->getAttribute($context["language"], "code", array());
                echo "\"><img src=\"catalog/language/";
                echo $this->getAttribute($context["language"], "code", array());
                echo "/";
                echo $this->getAttribute($context["language"], "code", array());
                echo ".png\" alt=\"";
                echo $this->getAttribute($context["language"], "name", array());
                echo "\" title=\"";
                echo $this->getAttribute($context["language"], "name", array());
                echo "\" />";
                echo $this->getAttribute($context["language"], "name", array());
                echo "</button>
        </li>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "      </ul>
    </div>
    <input type=\"hidden\" name=\"code\" value=\"\" />
    <input type=\"hidden\" name=\"redirect\" value=\"";
            // line 25
            echo (isset($context["redirect"]) ? $context["redirect"] : null);
            echo "\" />
  </form>
</div>";
        }
    }

    public function getTemplateName()
    {
        return "nice/template/common/language.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 25,  83 => 22,  65 => 19,  62 => 18,  58 => 17,  55 => 15,  47 => 9,  37 => 8,  33 => 7,  29 => 6,  24 => 3,  21 => 2,  19 => 1,);
    }
}
/* {% if languages|length > 1 %}*/
/* <div class="top-buttons--item">*/
/*   <form action="{{ action }}" method="post" enctype="multipart/form-data" id="form-language">*/
/*     <div class="btn-group">*/
/*       <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">*/
/*       {% for language in languages %}*/
/*       {% if language.code == code %} */
/*       <img src="catalog/language/{{ language.code }}/{{ language.code }}.png" alt="{{ language.name }}" title="{{ language.name }}">*/
/*       <span class="">{{ language.name }}</span>&nbsp;<i class="fa fa-caret-down"></i>*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*       {#<i class="fa fa-globe"></i>#}*/
/*       {#<i class="fa fa-language"></i>#}*/
/*       {#<span class="">{{ text_language }}</span>&nbsp;<i class="fa fa-caret-down"></i>#}*/
/*       </button>*/
/*       <ul class="dropdown-menu">*/
/*         {% for language in languages %}*/
/*         <li>*/
/*           <button class="btn btn-link btn-block language-select" type="button" name="{{ language.code }}"><img src="catalog/language/{{ language.code }}/{{ language.code }}.png" alt="{{ language.name }}" title="{{ language.name }}" /> {{ language.name }}</button>*/
/*         </li>*/
/*         {% endfor %}*/
/*       </ul>*/
/*     </div>*/
/*     <input type="hidden" name="code" value="" />*/
/*     <input type="hidden" name="redirect" value="{{ redirect }}" />*/
/*   </form>*/
/* </div>*/
/* {% endif %}*/
/* */
