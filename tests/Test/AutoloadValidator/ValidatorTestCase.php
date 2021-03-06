<?php

/**
 * This file is part of phpcq/autoload-validation.
 *
 * (c) 2014-2020 Christian Schiffler, Tristan Lins
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    phpcq/autoload-validation
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2014-2020 Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @license    https://github.com/phpcq/autoload-validation/blob/master/LICENSE MIT
 * @link       https://github.com/phpcq/autoload-validation
 * @filesource
 */

namespace PhpCodeQuality\AutoloadValidation\Test\AutoloadValidator;

use PhpCodeQuality\AutoloadValidation\ClassMapGenerator;
use PhpCodeQuality\AutoloadValidation\Report\Report;
use PhpCodeQuality\AutoloadValidation\Violation\ViolationInterface;
use PHPUnit\Framework\TestCase;

/**
 * This class is the base test case for testing validators.
 *
 * @runInSeparateProcess
 */
class ValidatorTestCase extends TestCase
{
    /**
     * Mock a class map generator.
     *
     * @param array $classMap The class map to return.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|ClassMapGenerator
     */
    protected function mockClassMapGenerator($classMap = [])
    {
        $mock = $this
            ->getMockBuilder(ClassMapGenerator::class)
            ->setMethods(['scan'])
            ->getMock();
        if ($classMap) {
            $mock->method('scan')->willReturn($classMap);
        }

        return $mock;
    }

    /**
     * Retrieve a mock of a report.
     *
     * @param string $expectedViolationClass The class name of the expected violation.
     *
     * @param array  $expectedParameters     The expected parameters of the violation.
     *
     * @return \PHPUnit_Framework_MockObject_MockObject|Report
     */
    protected function mockReport($expectedViolationClass = '', $expectedParameters = [])
    {
        $that = $this;

        $mock = $this
            ->getMockBuilder(Report::class)
            ->setMethods(['append'])
            ->disableOriginalConstructor()
            ->getMock();
        if ($expectedViolationClass) {
            $mock->expects(self::once())->method('append')->willReturnCallback(
                function (ViolationInterface $violation) use ($that, $expectedViolationClass, $expectedParameters) {
                    $that->assertInstanceOf($expectedViolationClass, $violation);
                    if (!empty($expectedParameters)) {
                        $that->assertEquals($expectedParameters, $violation->getParameters());
                    }
                }
            );
        } else {
            $mock->expects(self::never())->method('append');
        }

        return $mock;
    }
}
