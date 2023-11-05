<?php

namespace Lupecat\Render\Error;

use Prophecy\Exception\Exception;

class LoadRenderException extends \Exception {

    public function __construct($message = "", $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}