<?php

namespace VideoRecruit\Utils;

use Nette;

/**
 * Class Strings
 *
 * @package VideoRecruit\Utils
 */
final class Strings
{

	/**
	 * Converts string to camelCase
	 * @param string $string
	 * @return string
	 */
	public static function toCamelCase($string)
	{
		$func = function($matches) {
			return Nette\Utils\Strings::upper($matches[2]);
		};

		return Nette\Utils\Strings::firstLower(
			Nette\Utils\Strings::replace(
				$string,
				'/(_| |-)([a-zA-Z])/',
				$func
			)
		);
	}

	/**
	 * Converts string to PascalCase
	 * @param string $string
	 * @return string
	 */
	public static function toPascalCase($string)
	{
		return Nette\Utils\Strings::firstUpper(self::toCamelCase($string));
	}

	/**
	 * Converts string to snake_case
	 * @param string $string
	 * @return string
	 */
	public static function toSnakeCase($string)
	{
		$replace = [' ', '-'];
		return Nette\Utils\Strings::trim(
			Nette\Utils\Strings::lower(str_replace(
				$replace,
				'_',
				Nette\Utils\Strings::replace(
					ltrim($string, '!'),
					'/([^_]+[a-z -]{1})([A-Z])/U',
					'$1_$2'
				)
			))
		);
	}
}
