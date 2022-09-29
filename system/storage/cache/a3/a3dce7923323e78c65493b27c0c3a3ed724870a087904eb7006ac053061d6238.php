<?php

/* nice/template/common/nice_megamenu.twig */
class __TwigTemplate_0213f4f61f83436c607da8aaec5d407a8e0311bde7ddaf83694941a87415c2d0 extends Twig_Template
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
        echo "<div class=\"container\">
  <button class=\"main-nav-trigger\"><div></div></button>
  <nav role=\"navigation\" class=\"main-nav-wrap main-nav-wrap--in-container\">";
        // line 5
        echo "    <ul class=\"main-nav\">";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories_columned"]) ? $context["categories_columned"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 7
            if ((($this->getAttribute($context["category"], "nice_menu_category_columns", array()) < 2) &&  !$this->getAttribute($context["category"], "nmm_promo_status", array()))) {
                // line 8
                $context["class"] = "one-column";
            } else {
                // line 10
                $context["class"] = "";
            }
            // line 12
            if ($this->getAttribute($context["category"], "children", array())) {
                // line 13
                echo "      <li class=\"has-subnav";
                echo (isset($context["class"]) ? $context["class"] : null);
                echo "\">
        <a href=\"";
                // line 14
                echo $this->getAttribute($context["category"], "href", array());
                echo "\" class=\"has-subnav-link\">";
                echo $this->getAttribute($context["category"], "name", array());
                echo "</a>
        <ul class=\"main-dropdown subnav\">";
                // line 17
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "children", array()));
                foreach ($context['_seq'] as $context["column_i"] => $context["column"]) {
                    // line 18
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["column"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 20
                        if ($this->getAttribute($context["child"], "grandchildren", array())) {
                            // line 21
                            echo "          <li class=\"has-subnav\" data-nav=\"";
                            echo $context["column_i"];
                            echo "\">
            <a href=\"";
                            // line 22
                            echo $this->getAttribute($context["child"], "href", array());
                            echo "\" class=\"has-subnav-link subnav-header\">";
                            echo $this->getAttribute($context["child"], "name", array());
                            echo "</a>           
            <ul class=\"subnav\">";
                            // line 24
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["child"], "grandchildren", array()));
                            foreach ($context['_seq'] as $context["_key"] => $context["grandchild"]) {
                                // line 25
                                echo "              <li><a href=\"";
                                echo $this->getAttribute($context["grandchild"], "href", array());
                                echo "\">";
                                echo $this->getAttribute($context["grandchild"], "name", array());
                                echo "</a></li>";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['grandchild'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 27
                            echo "            </ul>
          </li>";
                        } else {
                            // line 30
                            echo "          <li class=\"has-subnav\" data-nav=\"";
                            echo $context["column_i"];
                            echo "\"><a href=\"";
                            echo $this->getAttribute($context["child"], "href", array());
                            echo "\" class=\"subnav-header\">";
                            echo $this->getAttribute($context["child"], "name", array());
                            echo "</a></li>";
                        }
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['column_i'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 36
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["category"], "children", array()));
                foreach ($context['_seq'] as $context["column_i"] => $context["column"]) {
                    // line 37
                    echo "            <li class=\"nav-col\" data-col=\"";
                    echo $context["column_i"];
                    echo "\"><ul class=\"nav\"></ul></li>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['column_i'], $context['column'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 40
                if ($this->getAttribute($context["category"], "nmm_promo_status", array())) {
                    echo " 
          <li class=\"subnav-promo\">";
                    // line 42
                    if ($this->getAttribute($context["category"], "nmm_image", array())) {
                        // line 43
                        echo "            <img src=\"";
                        echo $this->getAttribute($context["category"], "nmm_image", array());
                        echo "\" alt=\"";
                        echo $this->getAttribute($context["category"], "nmm_alt", array());
                        echo "\" class=\"promo-img img-responsive\">";
                    }
                    // line 45
                    if ((($this->getAttribute($context["category"], "nmm_title", array()) || $this->getAttribute($context["category"], "nmm_text", array())) || $this->getAttribute($context["category"], "nmm_anchor", array()))) {
                        // line 46
                        echo "            <div class=\"promo-body\">";
                        // line 47
                        if ($this->getAttribute($context["category"], "nmm_title", array())) {
                            echo "<p class=\"subnav-promo-header\">";
                            echo $this->getAttribute($context["category"], "nmm_title", array());
                            echo "</p>";
                        }
                        // line 48
                        if ($this->getAttribute($context["category"], "nmm_text", array())) {
                            echo "<div class=\"subnav-promo-text\">";
                            echo $this->getAttribute($context["category"], "nmm_text", array());
                            echo "</div>";
                        }
                        // line 49
                        if (($this->getAttribute($context["category"], "nmm_link", array()) && $this->getAttribute($context["category"], "nmm_anchor", array()))) {
                            echo "<a href=\"";
                            echo $this->getAttribute($context["category"], "nmm_link", array());
                            echo "\">";
                            echo $this->getAttribute($context["category"], "nmm_anchor", array());
                            echo "</a>";
                        }
                        // line 50
                        echo "            </div>";
                    }
                    // line 52
                    echo "          </li>";
                }
                // line 53
                echo "          
          
        </ul>        
      </li>";
            } else {
                // line 58
                echo "        <li><a href=\"";
                echo $this->getAttribute($context["category"], "href", array());
                echo "\">";
                echo $this->getAttribute($context["category"], "name", array());
                echo "</a></li>";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "      
    </ul>";
        // line 64
        echo "  </nav>
</div>
";
    }

    public function getTemplateName()
    {
        return "nice/template/common/nice_megamenu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  181 => 64,  178 => 61,  167 => 58,  161 => 53,  158 => 52,  155 => 50,  147 => 49,  141 => 48,  135 => 47,  133 => 46,  131 => 45,  124 => 43,  122 => 42,  118 => 40,  110 => 37,  106 => 36,  89 => 30,  85 => 27,  75 => 25,  71 => 24,  65 => 22,  60 => 21,  58 => 20,  54 => 18,  50 => 17,  44 => 14,  39 => 13,  37 => 12,  34 => 10,  31 => 8,  29 => 7,  25 => 6,  23 => 5,  19 => 1,);
    }
}
/* <div class="container">*/
/*   <button class="main-nav-trigger"><div></div></button>*/
/*   <nav role="navigation" class="main-nav-wrap main-nav-wrap--in-container">*/
/*     {#<div class="container">#}*/
/*     <ul class="main-nav">*/
/*       {% for category in categories_columned %}*/
/*       {% if category.nice_menu_category_columns < 2 and not(category.nmm_promo_status) %}*/
/*         {% set class = 'one-column' %}*/
/*       {% else %}*/
/*         {% set class = '' %}*/
/*       {% endif %}*/
/*       {% if category.children %}*/
/*       <li class="has-subnav {{ class }}">*/
/*         <a href="{{ category.href }}" class="has-subnav-link">{{ category.name }}</a>*/
/*         <ul class="main-dropdown subnav">*/
/*           */
/*           {% for column_i,column in category.children %}*/
/*           {% for child in column %}*/
/*           */
/*           {% if child.grandchildren %}*/
/*           <li class="has-subnav" data-nav="{{ column_i }}">*/
/*             <a href="{{ child.href }}" class="has-subnav-link subnav-header">{{ child.name }}</a>           */
/*             <ul class="subnav">*/
/*               {% for grandchild in child.grandchildren %}*/
/*               <li><a href="{{ grandchild.href }}">{{ grandchild.name }}</a></li>*/
/*               {% endfor %}*/
/*             </ul>*/
/*           </li>*/
/*           {% else %}*/
/*           <li class="has-subnav" data-nav="{{ column_i }}"><a href="{{ child.href }}" class="subnav-header">{{ child.name }}</a></li>*/
/*           {% endif %}*/
/*           */
/*           {% endfor %}*/
/*           {% endfor %}*/
/*           */
/*           {% for column_i,column in category.children %}*/
/*             <li class="nav-col" data-col="{{ column_i }}"><ul class="nav"></ul></li>*/
/*           {% endfor %}*/
/*           */
/*           {% if category.nmm_promo_status %} */
/*           <li class="subnav-promo">*/
/*             {% if category.nmm_image %}*/
/*             <img src="{{ category.nmm_image }}" alt="{{ category.nmm_alt }}" class="promo-img img-responsive">*/
/*             {% endif %}*/
/*             {% if category.nmm_title or category.nmm_text or category.nmm_anchor %}*/
/*             <div class="promo-body">*/
/*               {% if category.nmm_title %}<p class="subnav-promo-header">{{ category.nmm_title }}</p>{% endif %}*/
/*               {% if category.nmm_text %}<div class="subnav-promo-text">{{ category.nmm_text }}</div>{% endif %}*/
/*               {% if category.nmm_link and category.nmm_anchor %}<a href="{{ category.nmm_link }}">{{ category.nmm_anchor }}</a>{% endif %}*/
/*             </div>*/
/*             {% endif %}*/
/*           </li>*/
/*           {% endif %}          */
/*           */
/*         </ul>        */
/*       </li>*/
/*       {% else %}*/
/*         <li><a href="{{ category.href }}">{{ category.name }}</a></li>*/
/*       {% endif %}*/
/*       {% endfor %}*/
/*       */
/*     </ul>*/
/*     {#</div>#}*/
/*   </nav>*/
/* </div>*/
/* */
