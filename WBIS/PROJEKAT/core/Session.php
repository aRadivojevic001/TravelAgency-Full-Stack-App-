<?php

namespace app\core;

class Session
{

    public function __construct() {

        session_start();

        $flashMessages = $_SESSION[Constants::$FLASH_MESSAGE_SESSION] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['remove'] = true;
        }

        foreach ($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }


        $_SESSION[Constants::$FLASH_MESSAGE_SESSION] = $flashMessages;
    }

    public function setFlesh($key, $message) {
        $_SESSION[Constants::$FLASH_MESSAGE_SESSION][$key] = [
            'remove' => false,
            'value' => $message
        ];
    }


    public function getFlesh($key) {

        return $_SESSION[Constants::$FLASH_MESSAGE_SESSION][$key]['value'] ?? false;
    }



    public function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public function get($key) {
        return $_SESSION[$key] ?? false;
    }

    public function remove($key) {
        unset($_SESSION[$key]);
    }


    public function __destruct() {
        $flashMessages = $_SESSION[Constants::$FLASH_MESSAGE_SESSION] ?? [];

        foreach ($flashMessages as $key => &$flashMessage) {
            if($flashMessage['remove']) {
                unset($flashMessages[$key]);
            }
        }

        $_SESSION[Constants::$FLASH_MESSAGE_SESSION] = $flashMessages;

    }












}