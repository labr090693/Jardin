<?php
class ConfigReader
{
    private $_config;
    public function __construct($archivo)
    {
     if (!file_exists($archivo)) {
            throw new Exception('No Se Logro Encontrar el Archivo: '.$archivo);
        }
        $this->_config = parse_ini_file($archivo, true);
    }

    public function getConfig()
    {
        return $this->_config;
    }
}
?>
