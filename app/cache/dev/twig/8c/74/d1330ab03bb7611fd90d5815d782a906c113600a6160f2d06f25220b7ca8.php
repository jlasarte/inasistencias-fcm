<?php

/* SonataAdminBundle:Core:tab_menu_template.html.twig */
class __TwigTemplate_8c74d1330ab03bb7611fd90d5815d782a906c113600a6160f2d06f25220b7ca8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("knp_menu.html.twig");

        $this->blocks = array(
            'item' => array($this, 'block_item'),
            'dividerElement' => array($this, 'block_dividerElement'),
            'linkElement' => array($this, 'block_linkElement'),
            'spanElement' => array($this, 'block_spanElement'),
            'dropdownElement' => array($this, 'block_dropdownElement'),
            'label' => array($this, 'block_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "knp_menu.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_item($context, array $blocks = array())
    {
        // line 4
        $context["macros"] = $this->env->loadTemplate("knp_menu.html.twig");
        // line 5
        if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "displayed")) {
            // line 6
            $context["attributes"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attributes");
            // line 7
            $context["is_dropdown"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "dropdown", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "dropdown"), false)) : (false));
            // line 8
            $context["divider_prepend"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_prepend", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_prepend"), false)) : (false));
            // line 9
            $context["divider_append"] = (($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_append", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "divider_append"), false)) : (false));
            // line 10
            echo "
";
            // line 12
            $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), array("dropdown" => null, "divider_prepend" => null, "divider_append" => null));
            // line 14
            if ((isset($context["divider_prepend"]) ? $context["divider_prepend"] : $this->getContext($context, "divider_prepend"))) {
                // line 15
                echo "        ";
                $this->displayBlock("dividerElement", $context, $blocks);
            }
            // line 17
            echo "
";
            // line 19
            $context["classes"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "class"), "method"))) : (array()));
            // line 21
            if (array_key_exists("matcher", $context)) {
                echo " ";
                // line 22
                if ($this->getAttribute((isset($context["matcher"]) ? $context["matcher"] : $this->getContext($context, "matcher")), "isCurrent", array(0 => (isset($context["item"]) ? $context["item"] : $this->getContext($context, "item"))), "method")) {
                    // line 23
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "currentClass")));
                } elseif ($this->getAttribute((isset($context["matcher"]) ? $context["matcher"] : $this->getContext($context, "matcher")), "isAncestor", array(0 => (isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), 1 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "depth")), "method")) {
                    // line 25
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "ancestorClass")));
                }
            } else {
                // line 27
                echo " ";
                // line 28
                if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "current")) {
                    // line 29
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "currentClass")));
                } elseif ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "currentAncestor")) {
                    // line 31
                    $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "ancestorClass")));
                }
            }
            // line 35
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "actsLikeFirst")) {
                // line 36
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "firstClass")));
            }
            // line 38
            if ($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "actsLikeLast")) {
                // line 39
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "lastClass")));
            }
            // line 41
            echo "
";
            // line 43
            $context["childrenClasses"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttribute", array(0 => "class"), "method"))) : (array()));
            // line 44
            $context["childrenClasses"] = twig_array_merge((isset($context["childrenClasses"]) ? $context["childrenClasses"] : $this->getContext($context, "childrenClasses")), array(0 => ("menu_level_" . $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "level"))));
            // line 45
            echo "
";
            // line 47
            if ((isset($context["is_dropdown"]) ? $context["is_dropdown"] : $this->getContext($context, "is_dropdown"))) {
                // line 48
                $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => "dropdown"));
                // line 49
                $context["childrenClasses"] = twig_array_merge((isset($context["childrenClasses"]) ? $context["childrenClasses"] : $this->getContext($context, "childrenClasses")), array(0 => "dropdown-menu"));
            }
            // line 51
            echo "
";
            // line 53
            if ((!twig_test_empty((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes"))))) {
                // line 54
                $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), array("class" => twig_join_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), " ")));
            }
            // line 56
            $context["listAttributes"] = twig_array_merge($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "childrenAttributes"), array("class" => twig_join_filter((isset($context["childrenClasses"]) ? $context["childrenClasses"] : $this->getContext($context, "childrenClasses")), " ")));
            // line 57
            echo "
";
            // line 59
            echo "    <li";
            echo $context["macros"]->getattributes((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")));
            echo ">";
            // line 60
            if ((isset($context["is_dropdown"]) ? $context["is_dropdown"] : $this->getContext($context, "is_dropdown"))) {
                // line 61
                echo "            ";
                $this->displayBlock("dropdownElement", $context, $blocks);
            } elseif (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "uri"))) && ((!$this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "current")) || $this->getAttribute((isset($context["options"]) ? $context["options"] : $this->getContext($context, "options")), "currentAsLink")))) {
                // line 63
                echo "            ";
                $this->displayBlock("linkElement", $context, $blocks);
            } else {
                // line 65
                echo "            ";
                $this->displayBlock("spanElement", $context, $blocks);
            }
            // line 68
            echo "        ";
            $this->displayBlock("list", $context, $blocks);
            echo "
    </li>";
            // line 71
            if ((isset($context["divider_append"]) ? $context["divider_append"] : $this->getContext($context, "divider_append"))) {
                // line 72
                echo "        ";
                $this->displayBlock("dividerElement", $context, $blocks);
            }
        }
    }

    // line 77
    public function block_dividerElement($context, array $blocks = array())
    {
        // line 78
        if (($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "level") == 1)) {
            // line 79
            echo "    <li class=\"divider-vertical\"></li>
";
        } else {
            // line 81
            echo "    <li class=\"divider\"></li>
";
        }
    }

    // line 85
    public function block_linkElement($context, array $blocks = array())
    {
        // line 86
        echo "    <a href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "uri"), "html", null, true);
        echo "\"";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : $this->getContext($context, "macros")), "attributes", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttributes")), "method");
        echo ">
        ";
        // line 87
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method")))) {
            // line 88
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 90
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
    </a>
";
    }

    // line 94
    public function block_spanElement($context, array $blocks = array())
    {
        // line 95
        echo "    <span ";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : $this->getContext($context, "macros")), "attributes", array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "labelAttributes")), "method");
        echo ">
        ";
        // line 96
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method")))) {
            // line 97
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 99
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
    </span>
";
    }

    // line 103
    public function block_dropdownElement($context, array $blocks = array())
    {
        // line 104
        $context["classes"] = (((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttribute", array(0 => "class"), "method")))) ? (array(0 => $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttribute", array(0 => "class"), "method"))) : (array()));
        // line 105
        $context["classes"] = twig_array_merge((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), array(0 => "dropdown-toggle"));
        // line 106
        $context["attributes"] = $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "linkAttributes");
        // line 107
        $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), array("class" => twig_join_filter((isset($context["classes"]) ? $context["classes"] : $this->getContext($context, "classes")), " ")));
        // line 108
        $context["attributes"] = twig_array_merge((isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes")), array("data-toggle" => "dropdown"));
        // line 109
        echo "    <a href=\"#\"";
        echo $this->getAttribute((isset($context["macros"]) ? $context["macros"] : $this->getContext($context, "macros")), "attributes", array(0 => (isset($context["attributes"]) ? $context["attributes"] : $this->getContext($context, "attributes"))), "method");
        echo ">
        ";
        // line 110
        if ((!twig_test_empty($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method")))) {
            // line 111
            echo "            <i class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "attribute", array(0 => "icon"), "method"), "html", null, true);
            echo "\"></i>
        ";
        }
        // line 113
        echo "        ";
        $this->displayBlock("label", $context, $blocks);
        echo "
        <b class=\"caret\"></b>
    </a>
";
    }

    // line 118
    public function block_label($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans($this->getAttribute((isset($context["item"]) ? $context["item"] : $this->getContext($context, "item")), "label")), "html", null, true);
    }

    public function getTemplateName()
    {
        return "SonataAdminBundle:Core:tab_menu_template.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 111,  237 => 109,  229 => 105,  200 => 94,  168 => 81,  162 => 78,  133 => 61,  127 => 59,  42 => 7,  33 => 3,  1026 => 311,  1009 => 307,  953 => 301,  950 => 300,  942 => 296,  926 => 287,  924 => 286,  920 => 285,  917 => 284,  912 => 280,  900 => 277,  898 => 276,  893 => 274,  884 => 270,  880 => 267,  877 => 265,  865 => 259,  841 => 257,  838 => 255,  828 => 250,  824 => 247,  820 => 245,  817 => 244,  806 => 235,  804 => 234,  802 => 233,  795 => 229,  791 => 227,  789 => 226,  787 => 225,  780 => 221,  777 => 216,  772 => 212,  752 => 208,  749 => 206,  747 => 205,  742 => 202,  739 => 200,  737 => 199,  728 => 192,  726 => 191,  723 => 190,  717 => 186,  714 => 185,  701 => 180,  699 => 179,  696 => 178,  692 => 175,  690 => 174,  683 => 170,  664 => 160,  655 => 155,  653 => 154,  644 => 149,  641 => 148,  634 => 144,  630 => 141,  628 => 140,  625 => 139,  621 => 136,  619 => 135,  601 => 128,  596 => 127,  589 => 123,  586 => 122,  578 => 115,  572 => 112,  564 => 108,  559 => 104,  557 => 103,  553 => 101,  551 => 100,  547 => 99,  539 => 95,  508 => 88,  505 => 87,  477 => 80,  473 => 78,  468 => 77,  449 => 75,  442 => 71,  440 => 70,  430 => 65,  415 => 60,  413 => 59,  400 => 55,  397 => 54,  393 => 51,  381 => 47,  373 => 45,  363 => 38,  360 => 37,  340 => 27,  331 => 22,  329 => 21,  320 => 17,  303 => 13,  298 => 11,  290 => 5,  288 => 4,  281 => 310,  278 => 309,  260 => 291,  255 => 283,  245 => 269,  243 => 263,  240 => 262,  235 => 108,  220 => 232,  215 => 224,  212 => 223,  210 => 97,  207 => 215,  204 => 213,  202 => 212,  199 => 211,  191 => 194,  189 => 190,  186 => 88,  184 => 87,  174 => 85,  171 => 172,  169 => 168,  166 => 167,  164 => 79,  161 => 162,  149 => 148,  139 => 139,  124 => 57,  121 => 107,  109 => 48,  101 => 73,  71 => 15,  61 => 2,  1102 => 321,  1096 => 318,  1086 => 376,  1079 => 374,  1076 => 372,  1060 => 370,  1054 => 369,  1037 => 368,  1035 => 312,  1033 => 366,  1023 => 310,  1003 => 306,  979 => 323,  974 => 321,  968 => 318,  958 => 310,  941 => 307,  918 => 305,  915 => 304,  905 => 300,  901 => 299,  895 => 296,  872 => 263,  863 => 258,  859 => 280,  855 => 279,  851 => 278,  837 => 272,  831 => 251,  825 => 269,  818 => 267,  813 => 239,  810 => 238,  808 => 263,  799 => 232,  793 => 228,  790 => 254,  788 => 253,  784 => 224,  781 => 250,  766 => 248,  763 => 247,  760 => 246,  757 => 245,  755 => 244,  732 => 197,  724 => 233,  721 => 232,  704 => 182,  687 => 173,  682 => 227,  677 => 226,  674 => 165,  671 => 224,  661 => 218,  654 => 216,  637 => 145,  611 => 129,  597 => 206,  594 => 126,  585 => 200,  581 => 118,  579 => 116,  576 => 113,  574 => 195,  567 => 109,  561 => 171,  549 => 167,  542 => 96,  536 => 187,  534 => 186,  531 => 185,  525 => 92,  520 => 180,  517 => 179,  514 => 178,  494 => 175,  491 => 174,  489 => 167,  475 => 79,  469 => 160,  466 => 76,  463 => 158,  460 => 157,  454 => 156,  450 => 155,  429 => 149,  426 => 63,  423 => 147,  420 => 146,  417 => 145,  414 => 144,  411 => 143,  401 => 137,  398 => 136,  387 => 49,  379 => 130,  376 => 46,  369 => 125,  366 => 123,  359 => 120,  351 => 119,  348 => 118,  345 => 30,  328 => 111,  325 => 110,  319 => 108,  316 => 107,  307 => 105,  304 => 104,  280 => 94,  273 => 304,  266 => 294,  258 => 284,  253 => 274,  238 => 250,  227 => 104,  221 => 77,  217 => 231,  206 => 70,  179 => 178,  177 => 86,  172 => 59,  156 => 157,  154 => 153,  151 => 152,  148 => 55,  145 => 68,  143 => 53,  125 => 47,  117 => 53,  114 => 51,  111 => 49,  108 => 40,  99 => 54,  94 => 39,  91 => 44,  89 => 36,  312 => 106,  301 => 12,  295 => 142,  283 => 95,  277 => 93,  274 => 135,  272 => 134,  269 => 133,  265 => 130,  236 => 109,  216 => 99,  209 => 96,  203 => 95,  197 => 197,  187 => 87,  182 => 64,  176 => 177,  170 => 79,  165 => 77,  160 => 76,  158 => 75,  153 => 72,  141 => 65,  136 => 138,  132 => 59,  123 => 46,  120 => 45,  104 => 45,  98 => 47,  72 => 25,  51 => 12,  1031 => 295,  1028 => 294,  1025 => 293,  1021 => 326,  1017 => 324,  1011 => 321,  1008 => 320,  1006 => 319,  1000 => 305,  992 => 315,  989 => 314,  987 => 313,  984 => 312,  978 => 302,  976 => 309,  973 => 308,  967 => 306,  965 => 305,  962 => 304,  956 => 302,  954 => 301,  951 => 300,  945 => 298,  943 => 297,  940 => 296,  938 => 295,  935 => 294,  932 => 291,  928 => 264,  922 => 261,  919 => 260,  916 => 259,  913 => 258,  909 => 301,  904 => 278,  896 => 275,  891 => 275,  887 => 271,  885 => 272,  881 => 290,  875 => 264,  873 => 267,  869 => 265,  867 => 282,  864 => 257,  861 => 256,  858 => 255,  853 => 286,  850 => 255,  847 => 277,  842 => 275,  840 => 291,  835 => 253,  833 => 252,  830 => 253,  827 => 252,  822 => 246,  819 => 243,  815 => 242,  811 => 240,  805 => 262,  800 => 236,  794 => 235,  782 => 233,  779 => 232,  775 => 231,  769 => 249,  762 => 227,  758 => 226,  750 => 242,  744 => 203,  741 => 222,  738 => 240,  735 => 198,  730 => 219,  727 => 218,  725 => 217,  722 => 216,  719 => 187,  712 => 214,  709 => 213,  706 => 212,  703 => 211,  697 => 210,  694 => 209,  691 => 208,  688 => 206,  681 => 169,  678 => 168,  672 => 164,  669 => 163,  665 => 220,  662 => 159,  659 => 158,  656 => 198,  650 => 153,  646 => 150,  632 => 186,  626 => 184,  623 => 183,  620 => 213,  616 => 133,  613 => 243,  610 => 198,  608 => 210,  605 => 209,  602 => 208,  599 => 207,  593 => 247,  591 => 124,  587 => 179,  584 => 178,  577 => 114,  575 => 252,  571 => 194,  569 => 110,  566 => 177,  563 => 176,  555 => 102,  552 => 168,  544 => 97,  541 => 157,  533 => 151,  530 => 150,  526 => 147,  522 => 91,  516 => 143,  513 => 142,  510 => 141,  496 => 176,  490 => 138,  486 => 136,  480 => 82,  472 => 132,  470 => 131,  467 => 130,  464 => 129,  446 => 74,  443 => 154,  441 => 153,  438 => 69,  435 => 151,  432 => 66,  428 => 64,  424 => 62,  422 => 150,  418 => 148,  416 => 123,  405 => 58,  402 => 56,  399 => 112,  395 => 135,  391 => 109,  385 => 48,  382 => 131,  372 => 127,  367 => 102,  364 => 122,  361 => 121,  353 => 96,  346 => 93,  341 => 173,  338 => 114,  333 => 23,  330 => 92,  327 => 154,  321 => 109,  317 => 16,  314 => 86,  311 => 85,  297 => 84,  292 => 82,  289 => 140,  285 => 3,  262 => 76,  259 => 118,  256 => 74,  250 => 113,  248 => 270,  242 => 110,  239 => 68,  234 => 64,  231 => 106,  225 => 238,  219 => 101,  214 => 99,  208 => 96,  205 => 53,  196 => 51,  192 => 90,  185 => 66,  181 => 184,  175 => 43,  159 => 77,  155 => 39,  152 => 72,  147 => 69,  138 => 61,  131 => 60,  128 => 48,  122 => 56,  113 => 23,  107 => 47,  84 => 33,  79 => 26,  74 => 16,  66 => 10,  64 => 21,  60 => 21,  58 => 18,  54 => 25,  44 => 8,  118 => 32,  86 => 36,  75 => 39,  67 => 22,  63 => 22,  57 => 9,  48 => 10,  40 => 6,  35 => 16,  21 => 1,  392 => 107,  389 => 133,  383 => 104,  377 => 102,  374 => 104,  368 => 41,  365 => 39,  362 => 97,  354 => 95,  352 => 34,  349 => 33,  342 => 28,  337 => 26,  335 => 100,  332 => 88,  326 => 19,  324 => 18,  318 => 83,  315 => 150,  309 => 148,  305 => 77,  302 => 103,  299 => 102,  293 => 7,  287 => 71,  284 => 70,  282 => 78,  279 => 77,  276 => 305,  271 => 300,  268 => 299,  263 => 293,  257 => 56,  252 => 53,  233 => 107,  230 => 243,  224 => 103,  222 => 237,  211 => 73,  194 => 196,  190 => 69,  167 => 42,  150 => 71,  146 => 147,  144 => 144,  140 => 52,  137 => 63,  134 => 133,  129 => 122,  126 => 121,  119 => 54,  116 => 94,  110 => 51,  105 => 39,  102 => 44,  97 => 41,  95 => 28,  90 => 68,  87 => 35,  81 => 32,  78 => 28,  76 => 27,  69 => 23,  59 => 17,  55 => 15,  52 => 17,  46 => 9,  43 => 14,  41 => 6,  38 => 5,  36 => 4,  30 => 2,  24 => 1,  115 => 40,  112 => 52,  106 => 86,  100 => 43,  96 => 53,  92 => 38,  88 => 28,  83 => 31,  80 => 29,  73 => 26,  70 => 33,  62 => 19,  56 => 17,  53 => 14,  50 => 16,  45 => 4,  12 => 36,);
    }
}
