# Pls/Log
[![Version](https://img.shields.io/github/release-pre/PHP-library-standards/log.svg?label=version)](https://github.com/PHP-library-standards/log/releases/latest)
[![semver](https://img.shields.io/badge/semver-2.0.0-blue.svg)](https://semver.org/spec/v2.0.0.html)
[![License](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/PHP-library-standards/log/blob/master/LICENSE)

This package describes a common interface for logging libraries. Its goal is to allow libraries to receive an object implementing `Pls\Log\Logger` and write logs to it in a simple and universal way.

The key words “MUST”, “MUST NOT”, “REQUIRED”, “SHALL”, “SHALL NOT”, “SHOULD”, “SHOULD NOT”, “RECOMMENDED”, “MAY”, and “OPTIONAL” in this document are to be interpreted as described in [RFC 2119](http://tools.ietf.org/html/rfc2119).

## 1. Specification
Implementations MUST implement the specified functionality entirely and MAY provide more functionality than specified.

The `Pls\Log\LoggerInterface` exposes a method, `log`, to log messages. `log` accepts three arguments: `$level`, `$message` and `$context` (optional).

### 1.1 `$level`
This is an `int` value, corresponding to one of the eight [RFC 5424](http://tools.ietf.org/html/rfc5424) severity levels.

An interface, `LogLevel`, provides constants with semantic labels mapped to the `int` severity levels. Users are RECOMMENDED to pass these constants as `$level` values.

Passing a `$level` value that is not defined by this specification, i.e. that is not >= 0 and <= 7, MUST throw an instance of `Pls\Log\InvalidSeverity`.

### 1.2 `$message`
This is a user-defined `string` value to log.

The message MAY contain placeholders which implementors MAY replace with values from the context array.

Placeholder names MUST correspond to keys in the context array.

Placeholder names MUST be delimited with a single opening brace `{` and a single closing brace `}`. There MUST NOT be any whitespace between the delimiters and the placeholder name.

Placeholder names MUST be composed only of the characters `A-Z`, `a-z`, `0-9`, underscore `_`, and period `.`.

Implementors MAY use placeholders to implement various escaping strategies and translate logs for display. Users SHOULD NOT pre-escape placeholder values since they can not know in which context the data will be displayed.

Passing a `$message` value that contains a malformed placeholder name MUST throw an instance of `Pls\Log\InvalidMessage`.

### 1.3 `$context`
This is an optional user-defined `array`; the default value is an empty array, `[]`. This is meant to hold any extraneous information that does not fit well in a string. The array can contain anything. A given value in the context MUST NOT throw an exception nor raise any PHP error, warning or notice.

Array keys and values MAY be of any type PHP permits and MAY be of different types within a `$context` array, except that an array key corresponding to a placeholder name must be a `string`, identical to the placeholder name in `$message`.

An array value MUST be provided for each placeholder name in `$message`. Passing a `$context` array that does not contain a key corresponding to a placeholder name which is present in the passed `$message` MUST throw an instance of `Pls\Log\InvalidContext`.

If an object implementing `\Throwable` is passed in the context data, it MUST be in the `'thrown'` key. Logging exceptions is a common pattern and this allows implementors to extract a stack trace from the exception when the log backend supports it. Implementors MUST still verify that the `'thrown'` key is actually a `\Thowable` before using it as such, as it MAY contain anything.

### 1.4 Exceptions
All exceptions thrown by implementations MUST implement `Pls\Log\LoggerException`.

## 2. Package
The interfaces are provided as part of the [pls/log](https://packagist.org/packages/pls/log) package.

Packages providing a pls/log implementation SHOULD declare that they provide `pls/log-implementation` `1.0.0`.

Projects requiring an implementation SHOULD require `pls/log-implementation` `^1.0.0`.

## 3. Installation
To install with composer:

```
composer require pls/log
```

Requires PHP >= 7.3.

## 4. License
This package is released under the [MIT license](https://github.com/PHP-library-standards/log/blob/master/LICENSE).
