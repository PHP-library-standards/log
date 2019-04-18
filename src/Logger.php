<?php
/**
 * @package   Pls\Log
 * @author    PHP Library Standards <https://github.com/PHP-library-standards>
 * @copyright 2017 PHP Library Standards
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Pls\Log;

/**
 * Interface describing a logger.
 */
interface Logger
{
    /**
     * Logs a $message with an arbitrary RFC 5424 $level, optionally with a
     * $context.
     *
     * $message MAY contain placeholders which implementors MAY replace with
     * values from the $context array. Placeholder names MUST correspond to keys
     * in the context array. Placeholder names MUST be delimited with a single
     * opening brace `{` and a single closing brace `}`. There MUST NOT be any
     * whitespace between the delimiters and the placeholder name. Placeholder
     * names SHOULD be composed only of the characters `A-Z`, `a-z`, `0-9`,
     * underscore `_`, and dot `.`. The use of other characters is reserved for
     * future modifications of the placeholders specification.
     *
     * $context can contain anything. Implementors MUST ensure they treat
     * context data with as much lenience as possible. A given value in $context
     * MUST NOT throw an exception nor raise any php error, warning or notice.
     * If a `Throwable` object is passed in the context data, it MUST be in the
     * 'exception' key. Logging exceptions is a common pattern and this allows
     * implementors to extract a stack trace from the exception when the log
     * backend supports it. Implementors MUST still verify that the 'exception'
     * key is actually a `Throwable` before using it as such, as it MAY contain
     * anything.
     *
     * @param int    $level   One of the eight RFC 5424 levels (debug, info,
     *     notice, warning, error, critical, alert, emergency). It is
     *     RECOMMENDED to pass one of the `LogLevel` constants as this parameter
     *     value.
     * @param string $message Message to be logged which MAY container
     *     placeholders
     * @param array  $context Extraneous information to be logged that does not
     *     fit well in a string.
     *
     * @throws LogException MUST be thrown if a given parameter is an illegal
     *     value. This method MUST NOT throw any other exceptions.
     *
     * @return bool `true` on success, `false` otherwise.
     */
    public function log(int $level, string $message, array $context = []): bool;
}
