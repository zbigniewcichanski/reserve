<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:00
 */

require_once "bootstrap.php";

$containerBuilder = new \DI\ContainerBuilder();

$container =[
    //SERVICE ________________________________________SERVICE

    //APP __________________ APP
    'service-app-message' => function ($c) {
        return new \Core\Core\Message();
    },

    'service-app-category-service' => function ($c) {
        return new \Core\Service\App\CategoryService(
            $c->get('service-app-message'),
            $c->get('service-category-service'),
            $c->get('service-category-repository')
        );
    },

    //DM __________________ DM
    'service-category-service' => function ($c) {
        return new \Core\Service\Dm\Service\CategoryService(
            $c->get('service-category-repository'),
            $c->get('service-category-name-is-unique-specification')
        );
    },

    'service-category-repository' => function ($c) {
        return new \Core\Service\Dm\Repository\CategoryRepository($c->get('service-category-inf-convert'));
    },

    'service-category-name-is-unique-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\CategoryNameIsUnique($c->get('service-category-repository'));
    },

    //INF _________________ INF
    'service-database-factory' => function ($c) {
        $r = new \Core\Service\Inf\Database\DatabaseFactory(getenv('DB_HOST'), getenv('DB_BASE'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_PORT'));
        return $r;
    },

    'service-category-inf-convert' => function ($c) {
        return new \Core\Service\Inf\CategoryConvert($c->get('service-category-inf-repository'));
    },

    'service-category-inf-repository' => function ($c) {
        return new \Core\Service\Inf\Repository\PDOCategoryRepository($c->get('service-database-factory'));
    },

    'service-category-mapper' => function ($c) {
        return new \Core\Service\Inf\Mapper\CategoryMapper($c->get('service-database-factory'));
    },

    //SERVICE ________________________________________SERVICE - END
];

$containerBuilder->addDefinitions($container);

$c = $containerBuilder->build();
return $c;

