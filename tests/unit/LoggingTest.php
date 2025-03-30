<?php
use PHPUnit\Framework\TestCase;
use App\Models\Logging;

class LoggingTest extends TestCase
{
    private string $testDir;
    private string $testFile;

    protected function setUp(): void
    {
        $this->testDir = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'logtest_' . uniqid();
        $this->testFile = 'test.log';
    }

    protected function tearDown(): void
    {
        if (file_exists($this->testDir . DIRECTORY_SEPARATOR . $this->testFile)) {
            unlink($this->testDir . DIRECTORY_SEPARATOR . $this->testFile);
        }

        if (is_dir($this->testDir)) {
            rmdir($this->testDir);
        }
    }

    public function testLogFileIsCreated()
    {
        $logger = new Logging($this->testDir . DIRECTORY_SEPARATOR, $this->testFile);
        $fullPath = $this->testDir . DIRECTORY_SEPARATOR . $this->testFile;

        $this->assertFileExists($fullPath);
        $content = file_get_contents($fullPath);
        $this->assertStringContainsString('*** Log started at :', $content);
    }

    public function testErrorLogging()
    {
        $logger = new Logging($this->testDir . DIRECTORY_SEPARATOR, $this->testFile);
        $logger->Error('This is an error');
        $content = file_get_contents($this->testDir . DIRECTORY_SEPARATOR . $this->testFile);
//        print_r("content - |" . $content . "|");
        $this->assertStringContainsString('ERROR   : This is an error', $content);
    }

    public function testWarningLogging()
    {
        $logger = new Logging($this->testDir . DIRECTORY_SEPARATOR, $this->testFile);
        $logger->Warning('This is a warning');
        $content = file_get_contents($this->testDir . DIRECTORY_SEPARATOR . $this->testFile);
        $this->assertStringContainsString('WARNING : This is a warning', $content);
    }

    public function testInfoLogging()
    {
        $logger = new Logging($this->testDir . DIRECTORY_SEPARATOR, $this->testFile);
        $logger->Info('Some info');
        $content = file_get_contents($this->testDir . DIRECTORY_SEPARATOR . $this->testFile);
        $this->assertStringContainsString('INFO    : Some info', $content);
    }

    public function testDebugLogging()
    {
        $logger = new Logging($this->testDir . DIRECTORY_SEPARATOR, $this->testFile);
        $result = $logger->Debug('Debugging...');
        $this->assertTrue($result);

        $content = file_get_contents($this->testDir . DIRECTORY_SEPARATOR . $this->testFile);
        $this->assertStringContainsString('DEBUG   : Debugging...', $content);
    }
}
?>