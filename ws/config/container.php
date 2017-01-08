<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 23.12.2016
 * Time: 20:03
 */


return [
    'core' => function ($c) {

        $core = require_once realpath(__DIR__ . '/../../core/config/container.php');

        return $c;
    },

    'service-lesson-service' => function ($c) {
        return $c->get('core')->get('service-app-lesson-service');
    },
];