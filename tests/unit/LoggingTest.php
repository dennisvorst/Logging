<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class LoggingTest extends TestCase
{
    function testClassLoggingExists()
    {
        $this->assertTrue(class_exists("Logging"));
    }

    public function testClassLoggingCanBeInstatiated()
    {
        $object = new Logging();
        $this->assertInstanceOf(Logging::class, $object);
    }

    public function testCanLogWarning()
    {
        $object = new Logging();
        $this->assertTrue($object->Warning("test"));
    }

    public function testCanLogError()
    {
        $object = new Logging();
        $this->assertTrue($object->Error("test"));
    }

    public function testCanLogInfo()
    {
        $object = new Logging();
        $this->assertTrue($object->Info("test"));
    }

    public function testCanLogDebug()
    {
        $object = new Logging();
        $this->assertTrue($object->Debug("test"));
    }

    function __destruct() 
    {
        $dir = getcwd() . DIRECTORY_SEPARATOR . "logs" . DIRECTORY_SEPARATOR;
        $filename = $dir . "logfile.log";

        print_r($filename . "\n");
        print_r($dir . "\n");

        /** remove the logfile and then the directory */
        if (file_exists($filename)) {
            unlink($filename);
            rmdir($dir);
        }
    }    
}
?>

