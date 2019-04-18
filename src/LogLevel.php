<?php
/**
 * @package   Pls\Log
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2019 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Log;

/**
 * Log level severity values.
 */
interface LogLevel
{
    public const
        EMERGENCY = 0,
        ALERT     = 1,
        CRITICAL  = 2,
        ERROR     = 3,
        WARNING   = 4,
        NOTICE    = 5,
        INFO      = 6,
        DEBUG     = 7;
}
