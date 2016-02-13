<?php

/**
 * This file is part of phpcq/autoload-validation.
 *
 * (c) 2014 Christian Schiffler, Tristan Lins
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    phpcq/autoload-validation
 * @author     Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @copyright  2014-2016 Christian Schiffler <c.schiffler@cyberspectrum.de>
 * @license    https://github.com/phpcq/autoload-validation/blob/master/LICENSE MIT
 * @link       https://github.com/phpcq/autoload-validation
 * @filesource
 */

namespace PhpCodeQuality\AutoloadValidation\Violation\Psr0;

/**
 * This violation is shown when the namespace of a class does not match the expected psr-0 prefix.
 */
class NamespacePrefixMismatchViolation extends Psr0ValidatorViolation
{
    /**
     * The message that shall end up in logs.
     */
    const MESSAGE = <<<EOF
{validatorName}: Class {class} namespace {namespace} does not match prefix {psr0Prefix} for directory {path}!
EOF;

    /**
     * The class name.
     *
     * @var string
     */
    protected $class;

    /**
     * The namespace of the class.
     *
     * @var string
     */
    protected $namespace;

    /**
     * The path where the class has been found.
     *
     * @var string
     */
    protected $path;

    /**
     * Create a new instance.
     *
     * @param string $validatorName The name of the originating validator.
     *
     * @param string $class         The class name.
     *
     * @param string $psr0Prefix    The specified psr-0 namespace prefix.
     *
     * @param string $namespace     The namespace of the class.
     *
     * @param string $path          The path where the class has been found.
     */
    public function __construct($validatorName, $class, $psr0Prefix, $namespace, $path)
    {
        parent::__construct($validatorName, $psr0Prefix);
        $this->class     = $class;
        $this->namespace = $namespace;
        $this->path      = $path;
    }
}