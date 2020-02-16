<?php
declare(strict_types = 1);

namespace Embed\Tests;

use Embed\Embed;
use PHPUnit\Framework\TestCase;

abstract class AbstractTestCase extends TestCase
{
    private static Embed $embed;

    protected function assertEmbed(string $url, array $expected)
    {
        if (!isset(self::$embed)) {
            self::$embed = new Embed();
        }

        $extractor = self::$embed->get($url);

        foreach ($expected as $name => $value) {
            switch ($name) {
                case 'code':
                    $this->assertEquals($value, (string) $extractor->$name);
                break;
                default:
                    $this->assertEquals($value, $extractor->$name);
            }
        }
    }
}
