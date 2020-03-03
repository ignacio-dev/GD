<?php
    
    namespace Header;
    
    class NavLang extends Nav {
        public function __construct($keyVal) {
            global $lang, $menu, $display, $index;
            parent::__construct($keyVal);
            $this->link = "?lang={$this->keyVal}&menu={$menu}&display={$display}&index={$index}";
            if ($this->keyVal == $lang) {
                $this->cssClass = 'active';
            }
            $this->getData('nav-langs');
            $this->render();
        }
    }