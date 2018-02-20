<?php
spl_autoload_register(
    function($className) {
        $path = rtrim(__DIR__, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR ;
        $fullPath = $path . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists($fullPath)) {
            require $fullPath;
        }
    }
);
// Класс Автомобиль
echo '<h4>Автомобиль</h4>';
$vaz = new Products\Category\Car('автомобиль', 50000);
$vaz->setMake('VAZ');
$vaz->setModel('2101');
$vaz->setColor('красный');
$niva = new Products\Category\Car('автомобиль', 110000);
$niva->setMake('NIVA');
$niva->setModel('2104');
$niva->setColor('белый');
$vaz->printFullDescription();
echo '<br/>';
$niva->printFullDescription();
echo '<br/>';
echo '<br/>';
// Класс Телевизор
echo '<h4>Телевизор</h4>';
$samsung = new Products\Category\TV('телевизор', 32750);
$samsung->setMake('Samsung');
$samsung->setModel('UE40K');
$samsung->setSize(40);
$lg = new Products\Category\TV('телевизор', 28590);
$lg->setMake('LG');
$lg->setModel('LG 43UH');
$lg->setSize(43);
$samsung->printFullDescription();
echo '<br/>';
$lg->printFullDescription();
echo '<br/>';
echo '<br/>';
// Класс Шариковая ручка
echo '<h4>Шариковая ручка</h4>';
$montblanc = new Products\Category\Pen('шариковая ручка', 3499);
$montblanc->setInk('синяя');
$montblanc->setMake('Mont Blanc');
$giorgiofedon = new Products\Category\Pen('шариковая ручка', 1899);
$giorgiofedon->setInk('черная');
$giorgiofedon->setMake('Giorgio Fedon');
$montblanc->printFullDescription();
echo '<br/>';
$giorgiofedon->printFullDescription();
echo '<br/>';
echo '<br/>';
// Класс Утка
echo '<h4>Утка</h4>';
$duckRassia = new Products\Category\Duck('утка', '2500');
$duckRassia->setSpecies('Русская утка');
$duckRassia->setMake('Россия');
$duckRassia->setName('Дональд');
$duckUkrain = new Products\Category\Duck('утка', '1000');
$duckUkrain->setSpecies('Украинская утка');
$duckUkrain->setMake('Украина');
$duckUkrain->setName('Петр');
$duckRassia->printFullDescription();
echo '<br/>';
$duckUkrain->printFullDescription();
echo '<br/>';
echo '<br/>';
echo 'Количество созданных объектов: '.Products\Product::$staticProperty;
echo '<br/>';
echo '<br/>';
// Корзина
$basket = new Products\Basket();
$basket[] = $vaz;
$samsung->setPrice(NULL);
$basket[] = $samsung;
$basket[] = $montblanc;
$basket['утка'] = $duckRassia;
echo "<h2>В корзине товаров на общую сумму: {$basket->getPriceProductsBasket()} руб.</h2>";
// Заказ
$order = new Products\Order($basket);
$order->getInfoOrder();