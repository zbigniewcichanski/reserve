<?php
/**
 * Created by PhpStorm.
 * @author: Zbyszek Cichanski
 * Date: 29.12.2016
 * Time: 10:17
 */

namespace Core\Core;

class Message implements MessageInterface
{
    private $status;
    private $message;
    private $httpStatus;
    private $data;


    public function __construct()
    {

    }

    public function build(bool $status, string $message, int $httpStatus = 200, array $data = [])
    {
        $this->status = $status;
        $this->message = $message;
        $this->httpStatus = $httpStatus;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getHttpStatus()
    {
        return $this->httpStatus;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }



}