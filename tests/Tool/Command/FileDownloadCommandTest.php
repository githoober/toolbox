<?php declare(strict_types=1);

namespace Zalas\Toolbox\Tests\Tool\Command;

use PHPUnit\Framework\TestCase;
use Zalas\Toolbox\Tool\Command;
use Zalas\Toolbox\Tool\Command\FileDownloadCommand;

class FileDownloadCommandTest extends TestCase
{
    private const URL = 'https://example.com/file';
    private const FILE = '/usr/local/bin/file.txt';

    /**
     * @var FileDownloadCommand
     */
    private $command;

    protected function setUp(): void
    {
        $this->command = new FileDownloadCommand(self::URL, self::FILE);
    }

    public function test_it_is_a_command()
    {
        $this->assertInstanceOf(Command::class, $this->command);
    }

    public function test_it_generates_the_installation_command()
    {
        $this->assertRegExp(\sprintf('#curl .*? %s -o %s#', self::URL, self::FILE), (string) $this->command);
    }
}
