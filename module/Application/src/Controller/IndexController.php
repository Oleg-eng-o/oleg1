<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Application\Controller;

use Laminas\Mvc\Controller\AbstractActionController;
use Laminas\View\Model\ViewModel;



class IndexController extends AbstractActionController
{
    
    public function indexAction()
    {
    $products = [
        [
            'id' => '09.2019-03.2020',
            'name' => 'ООО "ИндексИндекс"',
            'price' => 'Бухгалтер',
        ],
        [
            'id' => '11.2017-07.2018',
            'name' => 'ПАО "Ростелеком"',
            'price' => 'Бухгалтер',
        ],
        [
            'id' => '05.2017-07.2017',
            'name' => 'МРИ ФНС №5 по Ярославской области',
            'price' =>'Государственный налоговый инспектор',
        ],
        [
            'id' =>'08.2016-02.2017',
            'name' => 'АО "Райффайзенбанк"',
            'price' => 'Младший специалист',
        ],
       
    ];
        // Используем плагин Layout для доступа к объекту ViewModel,
    // связанному с шаблоном лэйаута.
    $this->layout()->setTemplate('layout/layout2');
    
        return new ViewModel(['products' => $products]);
    }
    /**
     * This is the "about" action. It is used to display the "About" page.
     */
    public function aboutAction() 
    {              
        $appName = 'FormDemo';
        
        
        return new ViewModel([
            'appName' => $appName,
            
        ]);
    }
    // Действие, демонстрирующее использование частичных представлений.
public function partialDemoAction() 
{
    $products = [
        [
            'id' => 1,
            'name' => 'Digital Camera',
            'price' => 99.95,
        ],
        [
            'id' => 2,
            'name' => 'Tripod',
            'price' => 29.95,
        ],
        [
            'id' => 3,
            'name' => 'Camera Case',
            'price' => 2.99,
        ],
        [
            'id' => 4,
            'name' => 'Batteries',
            'price' => 39.99,
        ],
        [
            'id' => 5,
            'name' => 'Charger',
            'price' => 29.99,
        ],
    ];
	
    return new ViewModel(['products' => $products]);
}

    
}
