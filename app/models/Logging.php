<?php
namespace App\Models;

class Logging{
    var $_filename;
    var $_dir;

    function __construct(string $folder = null, string $filename = null)
    {
        /** location calculated from the html file location */
        $this->_dir = (empty($folder) ? "logs" . DIRECTORY_SEPARATOR  : $folder);
        $this->_filename = (empty($filename) ? "logfile.log" : $filename);
        
        $this->_filename = $this->_dir . $this->_filename;

        /** if the folder doesn't exist create it */
        if (!file_exists($this->_dir)) {
            mkdir($this->_dir, 0700, true);
        }

        /** write date and time we started logging */
        if (!file_exists($this->_filename)) {
            $fileObject = fopen($this->_filename, "w");
            fwrite($fileObject, "*** Log started at : " . date("Y-m-d h:i:sa") . "***\n");
            fclose($fileObject);
        }
    }

    function Error(string $msg)
    {
        return $this->_log("ERROR", $msg);        
    }

    function Warning(string $msg)
    {
        return $this->_log("WARNING", $msg);
    }

    function Info(string $msg)
    {
        return $this->_log("INFO", $msg);        
    }

    function Debug(string $msg) : bool
    {
        return $this->_log("DEBUG", $msg);
    }

    private function _log(string $type, string $msg) : bool
    {
        /** create the file if it doesn't exist */

        /** open it and log it, by appending to the file. */
        $fileObject = fopen($this->_filename, "a");

        /** create the type so that INFO, WARNING, DEBUG or any other type have the colon (:) in the same place */
        $type = substr($type . "          ", 0, 7);
        $line = $type . " : " . $msg . "\n";
        fwrite($fileObject, $line);
        fclose($fileObject);
        return true;
    }
}
?>