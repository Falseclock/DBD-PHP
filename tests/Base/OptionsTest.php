<?php
/**
 * OptionsTest
 *
 * @author    Nurlan Mukhanov <nurike@gmail.com>
 * @copyright 2020 Nurlan Mukhanov
 * @license   https://en.wikipedia.org/wiki/MIT_License MIT License
 * @link      https://github.com/Falseclock/dbd-php
 */
declare(strict_types=1);

namespace DBD\Tests\Base;

use DBD\Base\Options;
use PHPUnit\Framework\TestCase;

class OptionsTest extends TestCase
{
    public function testConstruct()
    {
        $options = new Options();
        self::assertFalse($options->isConvertBoolean());
        self::assertFalse($options->isConvertNumeric());
        self::assertTrue($options->isOnDemand());
        self::assertTrue($options->isPrintError());
        self::assertTrue($options->isRaiseError());
        self::assertFalse($options->isShowErrorStatement());
        self::assertFalse($options->isUseDebug());
        self::assertEquals("DBD-PHP", $options->getApplicationName());
        self::assertNotNull($options->getPlaceHolder());
        self::assertSame("?", $options->getPlaceHolder());
    }

    public function testConstructOverride()
    {
        $options = new Options(
            false,
            false,
            false,
            true,
            true,
            true,
            true,
            true,
            '!'
        );
        self::assertTrue($options->isConvertBoolean());
        self::assertTrue($options->isConvertNumeric());
        self::assertFalse($options->isOnDemand());
        self::assertFalse($options->isPrintError());
        self::assertFalse($options->isRaiseError());
        self::assertTrue($options->isShowErrorStatement());
        self::assertTrue($options->isUseDebug());
        self::assertEquals("DBD-PHP", $options->getApplicationName());
        self::assertNotNull($options->getPlaceHolder());
        self::assertSame("!", $options->getPlaceHolder());
    }

    public function testApplicationName()
    {
        $options = new Options();
        $options->setApplicationName("name");
        self::assertEquals("name", $options->getApplicationName());
    }

    public function testPlaceHolder()
    {
        $options = new Options();
        $options->setPlaceHolder("!");
        self::assertEquals("!", $options->getPlaceHolder());
    }

    public function testConvertBoolean()
    {
        $options = new Options();
        $options->setConvertBoolean(true);
        self::assertTrue($options->isConvertBoolean());

        $options->setConvertBoolean(false);
        self::assertFalse($options->isConvertBoolean());

    }

    public function testConvertNumeric()
    {
        $options = new Options();
        $options->setConvertNumeric(true);
        self::assertTrue($options->isConvertNumeric());

        $options->setConvertNumeric(false);
        self::assertFalse($options->isConvertNumeric());
    }

    public function testOnDemand()
    {
        $options = new Options();
        $options->setOnDemand(true);
        self::assertTrue($options->isOnDemand());

        $options->setOnDemand(false);
        self::assertFalse($options->isOnDemand());
    }

    public function testPrepareExecute()
    {
        $options = new Options();
        $options->setPrepareExecute(true);
        self::assertTrue($options->isPrepareExecute());

        $options->setPrepareExecute(false);
        self::assertFalse($options->isPrepareExecute());
    }

    public function testPrintError()
    {
        $options = new Options();
        $options->setPrintError(true);
        self::assertTrue($options->isPrintError());

        $options->setPrintError(false);
        self::assertFalse($options->isPrintError());
    }

    public function testRaiseError()
    {
        $options = new Options();
        $options->setRaiseError(true);
        self::assertTrue($options->isRaiseError());

        $options->setRaiseError(false);
        self::assertFalse($options->isRaiseError());
    }

    public function testShowErrorStatement()
    {
        $options = new Options();
        $options->setShowErrorStatement(true);
        self::assertTrue($options->isShowErrorStatement());

        $options->setShowErrorStatement(false);
        self::assertFalse($options->isShowErrorStatement());
    }

    public function testUseDebug()
    {
        $options = new Options();
        $options->setUseDebug(true);
        self::assertTrue($options->isUseDebug());

        $options->setUseDebug(false);
        self::assertFalse($options->isUseDebug());
    }
}