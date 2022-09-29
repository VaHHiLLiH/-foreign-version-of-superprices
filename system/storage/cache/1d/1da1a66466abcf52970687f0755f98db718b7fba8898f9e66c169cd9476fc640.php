<?php

/* nice/template/extension/module/nice_slideshow.twig */
class __TwigTemplate_190cad1082adc65cdc4734052bc0c097b965d039a32a04e7bf6fe3a764f816d6 extends Twig_Template
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
        echo "<div class=\"nice-slideshow";
        if ((isset($context["with_banners"]) ? $context["with_banners"] : null)) {
            echo "nice-slideshow-with-banners";
        }
        echo " swiper-viewport \">
  <div id=\"nice-slideshow\" class=\"swiper-container\">
    <div class=\"swiper-wrapper\">";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["slideshows"]) ? $context["slideshows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["slideshow"]) {
            // line 4
            echo "      <div class=\"swiper-slide text-center\">";
            if ($this->getAttribute($context["slideshow"], "link", array())) {
                echo "<a href=\"";
                echo $this->getAttribute($context["slideshow"], "link", array());
                echo "\"><img src=\"";
                echo $this->getAttribute($context["slideshow"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["slideshow"], "title", array());
                echo "\" class=\"img-responsive\" /></a>";
            } else {
                echo "<img src=\"";
                echo $this->getAttribute($context["slideshow"], "image", array());
                echo "\" alt=\"";
                echo $this->getAttribute($context["slideshow"], "title", array());
                echo "\" class=\"img-responsive\" />";
            }
            echo "</div>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['slideshow'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo " </div>
  </div>
  <div class=\"swiper-pagination nice-slideshow-pagination\"></div>
  <div class=\"swiper-pager\">
    <div class=\"swiper-button-next\"></div>
    <div class=\"swiper-button-prev\"></div>
  </div>
</div>
<script type=\"text/javascript\">
\$('#nice-slideshow').swiper({
\tmode: 'horizontal',
\tslidesPerView: 1,
\tpagination: '.nice-slideshow-pagination',
\tpaginationClickable: true,
\tnextButton: '.nice-slideshow .swiper-button-next',
  prevButton: '.nice-slideshow .swiper-button-prev',
  spaceBetween: 30,
\tautoplay: 2500,
  autoplayDisableOnInteraction: true,
\tloop: true
});
</script>";
        // line 27
        if ((isset($context["with_banners"]) ? $context["with_banners"] : null)) {
            // line 28
            echo "<div>";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["banners"]) ? $context["banners"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["banner"]) {
                // line 30
                echo "<a href=\"";
                echo $this->getAttribute($context["banner"], "link", array());
                echo "\" class=\"banner-near-slideshow\"><img src=\"";
                echo $this->getAttribute($context["banner"], "image", array());
                echo "\" class=\"img-responsive\" /></a>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['banner'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "</div>
<br class=\"clearfix\" />";
        }
    }

    public function getTemplateName()
    {
        return "nice/template/extension/module/nice_slideshow.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 32,  84 => 30,  80 => 29,  78 => 28,  76 => 27,  53 => 5,  31 => 4,  27 => 3,  19 => 1,);
    }
}
/* <div class="nice-slideshow {% if with_banners %}nice-slideshow-with-banners{% endif %} swiper-viewport ">*/
/*   <div id="nice-slideshow" class="swiper-container">*/
/*     <div class="swiper-wrapper"> {% for slideshow in slideshows %}*/
/*       <div class="swiper-slide text-center">{% if slideshow.link %}<a href="{{ slideshow.link }}"><img src="{{ slideshow.image }}" alt="{{ slideshow.title }}" class="img-responsive" /></a>{% else %}<img src="{{ slideshow.image }}" alt="{{ slideshow.title }}" class="img-responsive" />{% endif %}</div>*/
/*       {% endfor %} </div>*/
/*   </div>*/
/*   <div class="swiper-pagination nice-slideshow-pagination"></div>*/
/*   <div class="swiper-pager">*/
/*     <div class="swiper-button-next"></div>*/
/*     <div class="swiper-button-prev"></div>*/
/*   </div>*/
/* </div>*/
/* <script type="text/javascript">*/
/* $('#nice-slideshow').swiper({*/
/* 	mode: 'horizontal',*/
/* 	slidesPerView: 1,*/
/* 	pagination: '.nice-slideshow-pagination',*/
/* 	paginationClickable: true,*/
/* 	nextButton: '.nice-slideshow .swiper-button-next',*/
/*   prevButton: '.nice-slideshow .swiper-button-prev',*/
/*   spaceBetween: 30,*/
/* 	autoplay: 2500,*/
/*   autoplayDisableOnInteraction: true,*/
/* 	loop: true*/
/* });*/
/* </script>*/
/* {% if with_banners %}*/
/* <div>*/
/* {% for banner in banners %}*/
/* <a href="{{ banner.link }}" class="banner-near-slideshow"><img src="{{ banner.image }}" class="img-responsive" /></a>*/
/* {% endfor %}*/
/* </div>*/
/* <br class="clearfix" />*/
/* {% endif %}*/
