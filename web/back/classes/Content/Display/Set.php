<?php
    
    namespace Content\Display;
    
    class Set {
        private $series;
        private $client;
        private $imgPath;
        private $imgCount;
        
        // Labels
        private $clientLabel;
        
        public function __construct() {
            global $menu, $display;
            $this->imgPath  = "front/img/{$menu}/{$display}";
            $this->imgCount = count(glob("{$this->imgPath}/*.jpg"));
        }
        
        public function renderImgs() {
            for ($i = 1; $i <= $this->imgCount; $i++){
                ?>
                    <img src="<?= "{$this->imgPath}/{$i}.jpg?" . TIMESTAMP ?>">
                <?
            }
        }
    }