<?php

if (!defined('_PS_VERSION_')) {
    exit;
}

class MtrExample extends Module {

    public function __construct()
    {
        $this->name = 'mtrexample';
        $this->tab = 'front_office_features';
        $this->version = '1.0.0';
        $this->author = 'Matrizlab';
        $this->need_instance = 0;
        $this->ps_versions_compliancy = [
             'min' => '1.6',
             'max' => _PS_VERSION_
        ];
        $this->bootstrap = true;
    
        parent::__construct();
    
        $this->displayName = $this->l('Matrizlab PS Example');
        $this->description = $this->l('Description of my module Matrizlab PS Example.');
    
         $this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
    
         if (!Configuration::get('MATRIZLAB_PS_MODULE')) {
            $this->warning = $this->l('No name provided');
        }
    }
    

    /**
     * Don't forget to create update methods if needed:
     * http://doc.prestashop.com/display/PS16/Enabling+the+Auto-Update
     */
    public function install()
    {
        if (Shop::isFeatureActive()) {
            Shop::setContext(Shop::CONTEXT_ALL);
        }
    
        if (!parent::install() ||
            !$this->registerHook('leftColumn') ||
            !$this->registerHook('header') ||
            !Configuration::updateValue('MATRIZLAB_PS_MODULE', 'matrizlab.com')
        ) {
            return false;
        }
    
        return true;
    }

    public function uninstall()
    {
        if (!parent::uninstall() ||
            !Configuration::deleteByName('MATRIZLAB_PS_MODULE')
        ) {
            return false;
        }
    
        return true;
    }

    public function getContent()
    {
        return $this->display(__FILE__,'configure.tpl');
    }
    
}