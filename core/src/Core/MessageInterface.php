<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 28.12.2016
 * Time: 15:25
 */

namespace Core\Core;

interface MessageInterface
{
    public function build(bool $status, string $message, int $httpStatus, array $data=[]);

    public function getStatus();

    public function getMessage();

    public function getHttpStatus();

    public function getData();

}