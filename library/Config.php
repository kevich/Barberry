<?php

class Config {

    public $httpHost = 'bin.hostname.domain';
    public $directoryTemp;

//--------------------------------------------------------------------------------------------------

    /**
     * @var Config
     */
    private static $instance;

    public static function get() {
        if (is_null(self::$instance)) {
            self::$instance = new self(
                is_file(APPLICATION_PATH . '/etc/config.php') ?
                        include APPLICATION_PATH . '/etc/config.php' : array()
            );
        }
        return self::$instance;
    }

    public function __construct($optionsToOverride = array()) {
        foreach ($optionsToOverride as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

}