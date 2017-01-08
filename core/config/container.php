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

    'service-app-range-service' => function ($c) {
        return new \Core\Service\App\RangeService(
            $c->get('service-app-message'),
            $c->get('service-range-service'),
            $c->get('service-range-repository')
        );
    },

    'service-app-teacher-service' => function ($c) {
        return new \Core\Service\App\TeacherService(
            $c->get('service-app-message'),
            $c->get('service-teacher-service'),
            $c->get('service-teacher-repository')
        );
    },

    'service-app-lesson-service' => function ($c) {
        return new \Core\Service\App\LessonService(
            $c->get('service-app-message'),
            $c->get('service-lesson-service'),
            $c->get('service-lesson-repository')
        );
    },

    //DM __________________ DM
    'service-category-service' => function ($c) {
        return new \Core\Service\Dm\Service\CategoryService(
            $c->get('service-category-repository'),
            $c->get('service-category-name-is-unique-specification')
        );
    },
    'service-range-service' => function ($c) {
        return new \Core\Service\Dm\Service\RangeService(
            $c->get('service-range-repository'),
            $c->get('service-range-name-is-unique-specification')
        );
    },
    'service-teacher-service' => function ($c) {
        return new \Core\Service\Dm\Service\TeacherService(
            $c->get('service-teacher-repository'),
            $c->get('service-teacher-email-is-unique-specification'),
            $c->get('service-teacher-must-have-min-one-category-specification'),
            $c->get('service-teacher-must-have-min-one-range-specification')
        );
    },
    'service-lesson-service' => function ($c) {
        return new \Core\Service\Dm\Service\LessonService(
        );
    },

    'service-category-repository' => function ($c) {
        return new \Core\Service\Dm\Repository\CategoryRepository($c->get('service-category-inf-convert'));
    },
    'service-range-repository' => function ($c) {
        return new \Core\Service\Dm\Repository\RangeRepository($c->get('service-range-inf-convert'));
    },
    'service-teacher-repository' => function ($c) {
        return new \Core\Service\Dm\Repository\TeacherRepository($c->get('service-teacher-inf-convert'));
    },
    'service-lesson-repository' => function ($c) {
        return new \Core\Service\Dm\Repository\LessonRepository($c->get('service-lesson-inf-convert'));
    },

    'service-category-name-is-unique-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\CategoryNameIsUnique($c->get('service-category-repository'));
    },
    'service-range-name-is-unique-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\RangeNameIsUnique($c->get('service-range-repository'));
    },
    'service-teacher-email-is-unique-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\TeacherEmailIsUnique($c->get('service-teacher-repository'));
    },
    'service-teacher-must-have-min-one-range-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\TeacherMustHaveMinOneRange();
    },
    'service-teacher-must-have-min-one-category-specification' => function ($c) {
        return new \Core\Service\Dm\Specification\TeacherMustHaveMinOneCategory();
    },

    //INF _________________ INF
    'service-database-factory' => function ($c) {
        $r = new \Core\Service\Inf\Database\DatabaseFactory(getenv('DB_HOST'), getenv('DB_BASE'), getenv('DB_USER'), getenv('DB_PASS'), getenv('DB_PORT'));
        return $r;
    },

    'service-category-inf-convert' => function ($c) {
        return new \Core\Service\Inf\CategoryConvert($c->get('service-category-inf-repository'));
    },
    'service-range-inf-convert' => function ($c) {
        return new \Core\Service\Inf\RangeConvert($c->get('service-range-inf-repository'));
    },
    'service-teacher-inf-convert' => function ($c) {
        return new \Core\Service\Inf\TeacherConvert($c->get('service-teacher-inf-repository'));
    },
    'service-lesson-inf-convert' => function ($c) {
        return new \Core\Service\Inf\LessonConvert($c->get('service-lesson-inf-repository'));
    },

    'service-category-inf-repository' => function ($c) {
        return new \Core\Service\Inf\Repository\PDOCategoryRepository($c->get('service-database-factory'));
    },
    'service-range-inf-repository' => function ($c) {
        return new \Core\Service\Inf\Repository\PDORangeRepository($c->get('service-database-factory'));
    },
    'service-teacher-inf-repository' => function ($c) {
        return new \Core\Service\Inf\Repository\PDOTeacherRepository($c->get('service-database-factory'));
    },
    'service-lesson-inf-repository' => function ($c) {
        return new \Core\Service\Inf\Repository\PDOLessonRepository($c->get('service-database-factory'));
    },

    'service-category-mapper' => function ($c) {
        return new \Core\Service\Inf\Mapper\CategoryMapper($c->get('service-database-factory'));
    },
    'service-range-mapper' => function ($c) {
        return new \Core\Service\Inf\Mapper\RangeMapper($c->get('service-database-factory'));
    },
    'service-teacher-mapper' => function ($c) {
        return new \Core\Service\Inf\Mapper\TeacherMapper($c->get('service-database-factory'));
    },

    //SERVICE ________________________________________SERVICE - END
];

$containerBuilder->addDefinitions($container);

$c = $containerBuilder->build();
return $c;

