<?php

/* nice/template/common/header.twig */
class __TwigTemplate_b0b0b6b209d53c08e079f2da52600b8ba492f50904be6f992e1ffd99b4ff4096 extends Twig_Template
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
        echo "<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir=\"";
        // line 6
        echo (isset($context["direction"]) ? $context["direction"] : null);
        echo "\" lang=\"";
        echo (isset($context["lang"]) ? $context["lang"] : null);
        echo "\">
<!--<![endif]-->
<head>
<meta charset=\"UTF-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 12
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
<base href=\"";
        // line 13
        echo (isset($context["base"]) ? $context["base"] : null);
        echo "\" />";
        // line 14
        if ((isset($context["description"]) ? $context["description"] : null)) {
            // line 15
            echo "<meta name=\"description\" content=\"";
            echo (isset($context["description"]) ? $context["description"] : null);
            echo "\" />";
        }
        // line 17
        if ((isset($context["keywords"]) ? $context["keywords"] : null)) {
            // line 18
            echo "<meta name=\"keywords\" content=\"";
            echo (isset($context["keywords"]) ? $context["keywords"] : null);
            echo "\" />";
        }
        // line 20
        echo "<link href=\"catalog/view/javascript/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\" />
<link href=\"catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["styles"]) ? $context["styles"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 23
            echo "<link href=\"";
            echo $this->getAttribute($context["style"], "href", array());
            echo "\" type=\"text/css\" rel=\"";
            echo $this->getAttribute($context["style"], "rel", array());
            echo "\" media=\"";
            echo $this->getAttribute($context["style"], "media", array());
            echo "\" />";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "<link href=\"catalog/view/theme/nice/stylesheet/stylesheet.css\" rel=\"stylesheet\">";
        // line 30
        echo "<link href=\"//fonts.googleapis.com/css?family=Inter:100,100i,300,300i,400,400i,700,700i,900,900i\" rel=\"stylesheet\" type=\"text/css\" />
<script src=\"catalog/view/javascript/jquery/jquery-2.1.1.min.js\" type=\"text/javascript\"></script>
<script src=\"catalog/view/javascript/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["scripts"]) ? $context["scripts"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 34
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "<script src=\"catalog/view/theme/nice/javascript/common.js\" type=\"text/javascript\"></script>";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["links"]) ? $context["links"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 38
            echo "<link href=\"";
            echo $this->getAttribute($context["link"], "href", array());
            echo "\" rel=\"";
            echo $this->getAttribute($context["link"], "rel", array());
            echo "\" />";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["analytics"]) ? $context["analytics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 41
            echo $context["analytic"];
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "</head>
<body>
<nav id=\"top\">
  <div class=\"container top-container\">";
        // line 47
        echo (isset($context["menu_top"]) ? $context["menu_top"] : null);
        echo "
    
    <div class=\"top-buttons pull-right\">";
        // line 51
        echo (isset($context["currency"]) ? $context["currency"] : null);
        // line 52
        echo (isset($context["language"]) ? $context["language"] : null);
        // line 60
        echo "        
      <div class=\"account-container top-buttons--item\">
        <div class=\"btn-group dropdown\">
          <a href=\"";
        // line 63
        echo (isset($context["account"]) ? $context["account"] : null);
        echo "\" title=\"";
        echo (isset($context["text_account"]) ? $context["text_account"] : null);
        echo "\" class=\"btn btn-link dropdown-toggle padding-r-n-xs\" data-toggle=\"dropdown\"><i class=\"fa fa-user-o\"></i> <span class=\"\">";
        echo (isset($context["nice_text_account"]) ? $context["nice_text_account"] : null);
        echo "</span> <i class=\"fa fa-caret-down\"></i></a>

          <ul class=\"dropdown-menu dropdown-menu-right\">";
        // line 66
        if ((isset($context["logged"]) ? $context["logged"] : null)) {
            // line 67
            echo "            <li><a href=\"";
            echo (isset($context["account"]) ? $context["account"] : null);
            echo "\">";
            echo (isset($context["text_account"]) ? $context["text_account"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 68
            echo (isset($context["order"]) ? $context["order"] : null);
            echo "\">";
            echo (isset($context["text_order"]) ? $context["text_order"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 69
            echo (isset($context["transaction"]) ? $context["transaction"] : null);
            echo "\">";
            echo (isset($context["text_transaction"]) ? $context["text_transaction"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 70
            echo (isset($context["download"]) ? $context["download"] : null);
            echo "\">";
            echo (isset($context["text_download"]) ? $context["text_download"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 71
            echo (isset($context["logout"]) ? $context["logout"] : null);
            echo "\">";
            echo (isset($context["text_logout"]) ? $context["text_logout"] : null);
            echo "</a></li>";
        } else {
            // line 73
            echo "            <li><a href=\"";
            echo (isset($context["register"]) ? $context["register"] : null);
            echo "\">";
            echo (isset($context["text_register"]) ? $context["text_register"] : null);
            echo "</a></li>
            <li><a href=\"";
            // line 74
            echo (isset($context["login"]) ? $context["login"] : null);
            echo "\">";
            echo (isset($context["text_login"]) ? $context["text_login"] : null);
            echo "</a></li>";
        }
        // line 76
        echo "          </ul>
        </div>
      </div>      
    </div>
  </div>
</nav>
<header>
  <div class=\"container\">
    <div id=\"top-2\">      
      <div class=\"top-2--column logo-column\">
        <div id=\"logo\">";
        // line 87
        if ((isset($context["logo"]) ? $context["logo"] : null)) {
            echo "<a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\"><img src=\"";
            echo (isset($context["logo"]) ? $context["logo"] : null);
            echo "\" title=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" alt=\"";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "\" class=\"img-responsive\" /></a>";
        } else {
            // line 89
            echo "          <h1><a href=\"";
            echo (isset($context["home"]) ? $context["home"] : null);
            echo "\">";
            echo (isset($context["name"]) ? $context["name"] : null);
            echo "</a></h1>";
        }
        // line 91
        echo "        </div>
      </div>";
        // line 97
        echo "        
      <div class=\"top-2--column search-column--desktop\">";
        // line 98
        echo (isset($context["search"]) ? $context["search"] : null);
        echo "</div>
            
      <div class=\"top-2--column header-icons-column\">
        <div class=\"header-icons-container text-right\">          
          <div class=\"header-icons-item\">
            <a href=\"";
        // line 103
        echo (isset($context["contact"]) ? $context["contact"] : null);
        echo "\">
              <span class=\"fa-stack fa-lg header-icon\">
                <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
                <i class=\"fa fa-phone fa-stack-1x \"></i>
              </span>
              <span class=\"header-icon-label hidden-xs\"><span class=\"hidden-xs hidden-sm hidden-md\">";
        // line 108
        echo (isset($context["telephone"]) ? $context["telephone"] : null);
        echo "</span></span>
            </a>
          </div>                  
          <div class=\"header-icons-item\">
            <a href=\"";
        // line 112
        echo (isset($context["wishlist"]) ? $context["wishlist"] : null);
        echo "\" id=\"wishlist-total\">
              <i class=\"fa fa-heart-o fa-2x fa-lg header-icon\"></i>
              <span class=\"header-icon-label hidden-xs\">";
        // line 114
        echo (isset($context["text_wishlist"]) ? $context["text_wishlist"] : null);
        echo "</span>
            </a>
          </div>          
          <div class=\"header-icons-item\">
            <a href=\"";
        // line 118
        echo (isset($context["compare"]) ? $context["compare"] : null);
        echo "\">
              <span class=\"fa-stack fa-lg header-icon\">
                <i class=\"fa fa-circle-thin fa-stack-2x\"></i>
                <i class=\"fa fa-exchange fa-stack-1x \"></i>
              </span>
              <span class=\"header-icon-label hidden-xs\">";
        // line 123
        echo (isset($context["nice_text_compare"]) ? $context["nice_text_compare"] : null);
        echo "</span>
            </a>
          </div>";
        // line 130
        echo "          </div>
      </div>
          
      <div class=\"top-2--column cart-column text-right\">";
        // line 133
        echo (isset($context["cart"]) ? $context["cart"] : null);
        echo "</div>
      
    </div>
    <div class=\"search--mobile\"></div>
  </div>
</header>";
        // line 139
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "nice/template/common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  303 => 139,  295 => 133,  290 => 130,  285 => 123,  277 => 118,  270 => 114,  265 => 112,  258 => 108,  250 => 103,  242 => 98,  239 => 97,  236 => 91,  229 => 89,  217 => 87,  205 => 76,  199 => 74,  192 => 73,  186 => 71,  180 => 70,  174 => 69,  168 => 68,  161 => 67,  159 => 66,  150 => 63,  145 => 60,  143 => 52,  141 => 51,  136 => 47,  131 => 43,  125 => 41,  121 => 40,  111 => 38,  107 => 37,  105 => 36,  97 => 34,  93 => 33,  89 => 30,  87 => 25,  75 => 23,  71 => 22,  68 => 20,  63 => 18,  61 => 17,  56 => 15,  54 => 14,  51 => 13,  47 => 12,  36 => 6,  29 => 4,  23 => 3,  19 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <!--[if IE]><![endif]-->*/
/* <!--[if IE 8 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie8"><![endif]-->*/
/* <!--[if IE 9 ]><html dir="{{ direction }}" lang="{{ lang }}" class="ie9"><![endif]-->*/
/* <!--[if (gt IE 9)|!(IE)]><!-->*/
/* <html dir="{{ direction }}" lang="{{ lang }}">*/
/* <!--<![endif]-->*/
/* <head>*/
/* <meta charset="UTF-8" />*/
/* <meta name="viewport" content="width=device-width, initial-scale=1">*/
/* <meta http-equiv="X-UA-Compatible" content="IE=edge">*/
/* <title>{{ title }}</title>*/
/* <base href="{{ base }}" />*/
/* {% if description %}*/
/* <meta name="description" content="{{ description }}" />*/
/* {% endif %}*/
/* {% if keywords %}*/
/* <meta name="keywords" content="{{ keywords }}" />*/
/* {% endif %}*/
/* <link href="catalog/view/javascript/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />*/
/* <link href="catalog/view/javascript/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />*/
/* {% for style in styles %}*/
/* <link href="{{ style.href }}" type="text/css" rel="{{ style.rel }}" media="{{ style.media }}" />*/
/* {% endfor %}*/
/* <link href="catalog/view/theme/nice/stylesheet/stylesheet.css" rel="stylesheet">*/
/* {#<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,500i,700" rel="stylesheet">*/
/* <link href="//fonts.googleapis.com/css?family=Noto+Sans:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" type="text/css" />*/
/* <link href="//fonts.googleapis.com/css?family=Roboto+Flex:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" type="text/css" />*/
/* <link href="//fonts.googleapis.com/css?family=Nunito+Sans:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" type="text/css" />#}*/
/* <link href="//fonts.googleapis.com/css?family=Inter:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet" type="text/css" />*/
/* <script src="catalog/view/javascript/jquery/jquery-2.1.1.min.js" type="text/javascript"></script>*/
/* <script src="catalog/view/javascript/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>*/
/* {% for script in scripts %}*/
/* <script src="{{ script }}" type="text/javascript"></script>*/
/* {% endfor %}*/
/* <script src="catalog/view/theme/nice/javascript/common.js" type="text/javascript"></script>*/
/* {% for link in links %}*/
/* <link href="{{ link.href }}" rel="{{ link.rel }}" />*/
/* {% endfor %}*/
/* {% for analytic in analytics %}*/
/* {{ analytic }}*/
/* {% endfor %}*/
/* </head>*/
/* <body>*/
/* <nav id="top">*/
/*   <div class="container top-container">*/
/*     {{ menu_top }}*/
/*     */
/*     <div class="top-buttons pull-right">     */
/*         */
/*       {{ currency }}*/
/*       {{ language }}*/
/*       */
/*       {#<div class="nav top-links top-buttons--item">*/
/*         <ul class="list-inline">*/
/*           <li><a href="{{ wishlist }}" id="wishlist-total" title="{{ text_wishlist }}"><i class="fa fa-heart-o"></i> <span class="hidden-xs hidden-sm hidden-md">{{ text_wishlist }}</span></a></li>*/
/*           <li><a href="{{ compare }}" title="{{ nice_text_compare }}"><i class="fa fa-balance-scale"></i> <span class="hidden-xs">{{ nice_text_compare }}</span></a></li>*/
/*         </ul>*/
/*       </div>#}*/
/*         */
/*       <div class="account-container top-buttons--item">*/
/*         <div class="btn-group dropdown">*/
/*           <a href="{{ account }}" title="{{ text_account }}" class="btn btn-link dropdown-toggle padding-r-n-xs" data-toggle="dropdown"><i class="fa fa-user-o"></i> <span class="">{{ nice_text_account }}</span> <i class="fa fa-caret-down"></i></a>*/
/* */
/*           <ul class="dropdown-menu dropdown-menu-right">*/
/*             {% if logged %}*/
/*             <li><a href="{{ account }}">{{ text_account }}</a></li>*/
/*             <li><a href="{{ order }}">{{ text_order }}</a></li>*/
/*             <li><a href="{{ transaction }}">{{ text_transaction }}</a></li>*/
/*             <li><a href="{{ download }}">{{ text_download }}</a></li>*/
/*             <li><a href="{{ logout }}">{{ text_logout }}</a></li>*/
/*             {% else %}*/
/*             <li><a href="{{ register }}">{{ text_register }}</a></li>*/
/*             <li><a href="{{ login }}">{{ text_login }}</a></li>*/
/*             {% endif %}*/
/*           </ul>*/
/*         </div>*/
/*       </div>      */
/*     </div>*/
/*   </div>*/
/* </nav>*/
/* <header>*/
/*   <div class="container">*/
/*     <div id="top-2">      */
/*       <div class="top-2--column logo-column">*/
/*         <div id="logo">*/
/*           {% if logo %}<a href="{{ home }}"><img src="{{ logo }}" title="{{ name }}" alt="{{ name }}" class="img-responsive" /></a>*/
/*           {% else %}*/
/*           <h1><a href="{{ home }}">{{ name }}</a></h1>*/
/*           {% endif %}*/
/*         </div>*/
/*       </div>*/
/*         */
/*       {#<div class="top-2--column tagline-column">*/
/*         <div>Some text here</div>*/
/*       </div>#}*/
/*         */
/*       <div class="top-2--column search-column--desktop">{{ search }}</div>*/
/*             */
/*       <div class="top-2--column header-icons-column">*/
/*         <div class="header-icons-container text-right">          */
/*           <div class="header-icons-item">*/
/*             <a href="{{ contact }}">*/
/*               <span class="fa-stack fa-lg header-icon">*/
/*                 <i class="fa fa-circle-thin fa-stack-2x"></i>*/
/*                 <i class="fa fa-phone fa-stack-1x "></i>*/
/*               </span>*/
/*               <span class="header-icon-label hidden-xs"><span class="hidden-xs hidden-sm hidden-md"> {{ telephone }}</span></span>*/
/*             </a>*/
/*           </div>                  */
/*           <div class="header-icons-item">*/
/*             <a href="{{ wishlist }}" id="wishlist-total">*/
/*               <i class="fa fa-heart-o fa-2x fa-lg header-icon"></i>*/
/*               <span class="header-icon-label hidden-xs">{{ text_wishlist }}</span>*/
/*             </a>*/
/*           </div>          */
/*           <div class="header-icons-item">*/
/*             <a href="{{ compare }}">*/
/*               <span class="fa-stack fa-lg header-icon">*/
/*                 <i class="fa fa-circle-thin fa-stack-2x"></i>*/
/*                 <i class="fa fa-exchange fa-stack-1x "></i>*/
/*               </span>*/
/*               <span class="header-icon-label hidden-xs">{{ nice_text_compare }}</span>*/
/*             </a>*/
/*           </div>          */
/*           {#<div class="header-icons-item">*/
/*             <i class="fa fa-user-circle-o fa-2x fa-lg header-icon"></i>*/
/*             <span class="header-icon-label hidden-xs">Account</span>*/
/*           </div>#}*/
/*           </div>*/
/*       </div>*/
/*           */
/*       <div class="top-2--column cart-column text-right">{{ cart }}</div>*/
/*       */
/*     </div>*/
/*     <div class="search--mobile"></div>*/
/*   </div>*/
/* </header>*/
/* {{ menu }}*/
/* */
