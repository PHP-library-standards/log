<?php
/**
 * @package   Pls\Log
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2019 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Log;

use \Throwable;

/**
 * Base exception interface for logger exceptions.
 *
 * This interface MUST be implemented by all exceptions thrown by a `Logger`
 * implementation.
 */
interface LoggerException extends Throwable
{
}
