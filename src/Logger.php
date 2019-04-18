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
     * Logs a $message with an arbitrary severity $level, optionally with a
     * $context array.
     *
     * @param int    $level   The severity level of the message; One of the
     *     eight RFC 5424 levels (debug, info, notice, warning, error, critical, 
     *     alert, emergency). It is RECOMMENDED to pass one of the `LogLevel`
     *     constants as this parameter value.
     * @param string $message Message to be logged. The message MAY contain
     *     placeholders which implementors MUST replace with values from the
     *     $context array. Placeholder names MUST correspond to keys in the
     *     context array. Placeholder names MUST be delimited with a single
     *     opening brace `{` and a single closing brace `}`. There MUST NOT be
     *     any whitespace between the delimiters and the placeholder name.
     *     Placeholder names MUST be composed only of the characters `A-Z`,
     *     `a-z`, `0-9`, underscore `_`, and dot `.`.
     * @param array  $context Extraneous information to be logged. A given value
     *     in the context MUST NOT throw an exception nor raise any PHP error,
     *     warning or notice. If an object implementing `\Throwable` is passed 
     *     in the context data, it MUST be in the `'thrown'` key. Implementors
     *     MUST verify that the `'thrown'` key is actually a `\Throwable` before
     *     using it as such, as it MAY contain anything.
     *
     * @throws InvalidContext  $context is missing a value for a placeholder in
     *     $message.
     * @throws InvalidMessage  $message contains invalid placeholder names.
     * @throws InvalidSeverity $level is not >= 0 and <= 7.
     *
     * @return void
     */
    public function log(int $level, string $message, array $context = []): void;
}
