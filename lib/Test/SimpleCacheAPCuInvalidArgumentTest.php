<?php

/*
 +-------------------------------------------------------+
 |                                                       |
 | Copyright (c) 2018 Alice Wonder Miscreations          |
 |  May be used under terms of MIT license               |
 |                                                       |
 | PHPUnit does not work for unit testing where APCu is  |
 |  required, so these tests return bool true on pass or |
 |  bool false on failure.                               |
 +-------------------------------------------------------+
 | Purpose: Unit Testing for Invalid Arguments           |
 +-------------------------------------------------------+
*/

namespace AWonderPHP\SimpleCacheAPCu\Test;

class SimpleCacheAPCuInvalidArgumentTest
{
    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testEmptyWebappPrefixException($hexkey = null): bool
    {
        $prefix = '   ';
        if (is_null($hexkey)) {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix must be at least 3 characters. You supplied an empty Prefix.";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        } else {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey, $prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix must be at least 3 characters. You supplied an empty Prefix.";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testBarelyTooShortPrefixException($hexkey = null): bool
    {
        $prefix = '  aa ';
        if (is_null($hexkey)) {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix must be at least 3 characters. You supplied a 2 character Prefix: AA";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        } else {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey, $prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix must be at least 3 characters. You supplied a 2 character Prefix: AA";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testNonAlphaNumericPrefix($hexkey = null): bool
    {
        $prefix = '  aa_bb ';
        if (is_null($hexkey)) {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix can only contain A-Z letters and 0-9 numbers. You supplied: AA_BB";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        } else {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey, $prefix);
            } catch (\InvalidArgumentException $e) {
                $reference = "The WebApp Prefix can only contain A-Z letters and 0-9 numbers. You supplied: AA_BB";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        }
        return false;
    }

    // salt tests

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testEmptySalt($hexkey = null): bool
    {
        $prefix = '  aabb ';
        $salt = '                        ';
        if (is_null($hexkey)) {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
            } catch (\InvalidArgumentException $e) {
                $reference = "The internal key salt must be at least 8 characters. You supplied an empty salt.";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        } else {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey, $prefix, $salt);
            } catch (\InvalidArgumentException $e) {
                $reference = "The internal key salt must be at least 8 characters. You supplied an empty salt.";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testSaltBarelyTooShort($hexkey = null): bool
    {
        $prefix = '  aabb ';
        $salt = '        1234567                ';
        if (is_null($hexkey)) {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
            } catch (\InvalidArgumentException $e) {
                $reference = "The internal key salt must be at least 8 characters. You supplied a 7 character salt: 1234567";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        } else {
            try {
                $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey, $prefix, $salt);
            } catch (\InvalidArgumentException $e) {
                $reference = "The internal key salt must be at least 8 characters. You supplied a 7 character salt: 1234567";
                $actual = $e->getMessage();
                if ($reference === $actual) {
                    return true;
                } else {
                    var_dump($actual);
                }
            }
        }
        return false;
    }

    // TTL tests

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testExceptionNegativeDefaultTTL($hexkey = null): bool
    {
        $ttl = -7;
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch (\InvalidArgumentException $e) {
            $reference = "The default TTL can not be a negative number. You supplied -7.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    // key set tests

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testEmptyKey($hexkey = null): bool
    {
        $key = '    ';
        $value = 'Test Value';
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set($key, $value);
        } catch (\InvalidArgumentException $e) {
            $reference = "The cache key you supplied was an empty string. It must contain at least one character.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testBarelyTooLongKey($hexkey = null): bool
    {
        $a='AAAAABB';
        $b='BBBBBBBB';
        $key = 'z';

        for ($i=0; $i<=30; $i++) {
            $key .= $b;
        }

        $key .= $a;
        if (strlen($key) !== 256) {
            return false;
        }
        $value = 'foobar';
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set($key, $value);
        } catch (\InvalidArgumentException $e) {
            $reference = "Cache keys may not be longer than 255 characters. Your key is 256 characters long.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testReservedCharacterInKey($hexkey = null): bool
    {
        $reserved = array('key{key', 'key}key', 'key(key', 'key)key', 'key/key', 'key\\key',  'key@key', 'key:key');
        $value = 'value';
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        $reference = 'Cache keys may not contain any of the following characters: "  {}()/\@:  " but your key';
        foreach ($reserved as $key) {
            $caught = false;
            try {
                $simpleCache->set($key, $value);
            } catch (\InvalidArgumentException $e) {
                $err = $e->getMessage();
                $actual = substr($err, 0, 87);
                if ($reference !== $actual) {
                    var_dump($actual);
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testNegativeTTL($hexkey = null): bool
    {
        $key = "foo";
        $value = "bar";
        $ttl = -379;
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set('foo', 'bar', $ttl);
        } catch (\InvalidArgumentException $e) {
            $reference = "The TTL can not be a negative number. You supplied -379.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testDateStringInPastTTL($hexkey = null): bool
    {
        $key = "foo";
        $value = "bar";
        $ttl = "1984-02-21";
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set('foo', 'bar', $ttl);
        } catch (\InvalidArgumentException $e) {
            $reference = "The cache expiration can not be in the past. You supplied 1984-02-21.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testDateRangeInPastTTL($hexkey = null): bool
    {
        $key = "foo";
        $value = "bar";
        $ttl = "-1 week";
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set('foo', 'bar', $ttl);
        } catch (\InvalidArgumentException $e) {
            $reference = "The cache expiration can not be in the past. You supplied -1 week.";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testBogusStringinTTL($hexkey = null): bool
    {
        $key = "foo";
        $value = "bar";
        $ttl = "LKvfs4dh#";
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->set('foo', 'bar', $ttl);
        } catch (\InvalidArgumentException $e) {
            $reference = "The cache expiration must be a non-zero TTL in seconds, seconds from UNIX epoch, a DateInterval, or an expiration date string. You supplied: LKvfs4dh#";
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }

    /**
     * error test
     *
     * @param null|string $hexkey A hex key
     *
     * @return bool
     */
    public static function testKeyInIterableSetNotLegal($hexkey = null): bool
    {
        $arr = array('key1' => 'value1', 'key2' => 'value2', 'ke}y3' => 'value3', 'key4' => 'value4', 'key5' => 'value5');
        if (is_null($hexkey)) {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCu();
        } else {
            $simpleCache = new \AWonderPHP\SimpleCacheAPCu\SimpleCacheAPCuSodium($hexkey);
        }
        try {
            $simpleCache->setMultiple($arr);
        } catch (\InvalidArgumentException $e) {
            $reference = 'Cache keys may not contain any of the following characters: "  {}()/\@:  " but your key "  ke}y3  " does.';
            $actual = $e->getMessage();
            if ($reference === $actual) {
                return true;
            } else {
                var_dump($actual);
            }
        }
        return false;
    }
}

// Dear PSR-2: You can take my closing PHP tag when you can pry it from my cold dead fingers.
?>