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

namespace PhpCodeQuality\AutoloadValidation\Violation\Psr4;

/**
 * This error message is shown when a path specified in a psr-4 information does not contain any classes.
 */
class NoClassesFoundInPathViolation extends AbstractPsr4Violation
{
    /**
     * This error message is shown when a scanned path from a validator does not contain any classes.
     */
    const MESSAGE = '{validatorName}: No classes found in {path} for psr-0 prefix {psr4Prefix}';
}
