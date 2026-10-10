<?php

declare(strict_types=1);

namespace ReinfyTeam\libpf;

final class libpf {
	/** @return list<string> */
	public static function defaultProfanity() : array { return []; }

	/** @param list<string> $profanity */
	public static function detectProfanity(string $message, array $profanity) : bool { return false; }

	/** @param list<string> $profanity */
	public static function removeProfanity(string $message, array $profanity, string $replacement) : string { return $message; }

	public static function removeUnicode(string $message, bool $remove) : string { return $message; }
}
