<?php

namespace Lupecat\Render;

use Jenssegers\Blade\Blade;

class Render {

    /**
     * @var Blade
     */
    private $blade;

    /**
     * @var $instance
     */
    private static $instance;

    private function __construct($viewPath, $viewCachePath) {

        $this->blade = new Blade(
            [
                $viewPath
            ], $viewCachePath
        );

    }

    /**
     * @param $viewPath
     * @param $viewCachePath
     * @return Render
     */
    public static function create($viewPath, $viewCachePath) {

        if (!isset(self::$instance)) {
            self::$instance = new self($viewPath, $viewCachePath);
        }

        return self::$instance;

    }

    /**
     * @throws \Exception
     */
    public static function load() {

        if (!isset(self::$instance)) {
            throw new \Exception(
                "Instance to render with Blade can't be load without create previously."
            );
        }

        return self::$instance;

    }

    /**
     * Aplica las variables al template indicado
     *
     * @param $template
     * @param $data
     * @return string
     */
    public function createRender($template, $data) {
        return $this->blade->render($template, $data);
    }

}