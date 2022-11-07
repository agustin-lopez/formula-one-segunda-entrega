<?php

    require_once './libs/smarty/libs/Smarty.class.php';

    class index {

        private $smarty;

        public function __construct() {
            $this->smarty = new Smarty(); //INICIALIZO SMARTY
        }

        function showHome($error = null) {

            $this->smarty->assign('error', $error);
            $this->smarty->display('index.tpl');

        }

    }