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
 | Purpose: Unit Testing for Type Errors                 |
 +-------------------------------------------------------+
*/

namespace AliceWonderMiscreations\SimpleCacheAPCu\Test;

class SimpleCacheAPCuTypeErrorTest
{
    public static function testTypeErrorPrefixNotStringStrict(): bool {
        $salt = null;
        //integer
        $prefix = 5555;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type integer.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //float
        $prefix = 55.55;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type double.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }  
        //boolean
        $prefix = true;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type boolean.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //array
        $prefix = array(1,2,3,4,5);
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type array.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //object
        $prefix = new \stdClass;
        $prefix->foobar = "fubar";
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type object.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorPrefixNotString(): bool {
        //integer
        $prefix = 5555;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($prefix);
            return false;
        }
        //float
        $prefix = 55.55;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
        } catch(\InvalidArgumentException $e) {
            $reference = 'The WebApp Prefix can only contain A-Z letters and 0-9 numbers. You supplied: 55.55';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }  
        //boolean
        $prefix = true;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type boolean.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //array
        $prefix = array(1,2,3,4,5);
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type array.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //object
        $prefix = new \stdClass;
        $prefix->foobar = "fubar";
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix);
        } catch(\TypeError $e) {
            $reference = 'The WebApp Prefix argument to the SimpleCacheAPCu constructor must be a string. You supplied type object.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorSaltNotStringStrict(): bool {
        $prefix = null;
        //integer
        $salt = 123456789;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type integer.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($salt);
            return false;
        }
        //float
        $salt = 1234.56789;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type double.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($salt);
            return false;
        }
        //boolean
        $salt = true;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type boolean.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //array
        $salt = array(1,2,3,4,5,6,7,8,9);
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type array.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //object
        $salt = new \stdClass;
        $salt->foobar = "fubar98765";
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt, true);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type object.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorSaltNotString(): bool {
        $prefix = null;
        //integer
        $salt = 123456789;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($salt);
            return false;
        }
        //float
        $salt = 1234.56789;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($salt);
            return false;
        }
        //boolean
        $salt = true;
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type boolean.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //array
        $salt = array(1,2,3,4,5,6,7,8,9);
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type array.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        //object
        $salt = new \stdClass;
        $salt->foobar = "fubar98765";
        $caught = false;
        try {
            $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu($prefix, $salt);
        } catch(\TypeError $e) {
            $reference = 'The Salt argument to the SimpleCacheAPCu constructor must be a string. You supplied type object.';
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($prefix);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorDefaultTTLNotIntStrict(): bool {
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu(null, null, true);
        //null
        $ttl = null;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type NULL.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //float
        $ttl = 55.55;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type double.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //boolean
        $ttl = true;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //array
        $ttl = array(1,3,5);
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //object
        $ttl = new \stdClass;
        $ttl->foo = 7;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //make sure we can still set one to a positive integer
        // on same object
        $ttl = 700;
        $key = 'some key for default ttl type test';
        $value = 'some value';
        $simpleCache->setDefaultSeconds($ttl);
        $simpleCache->set($key, $value);
        
        $realKey = $simpleCache->getRealKey($key);
        $info = apcu_cache_info();
        foreach($info['cache_list'] as $cached) {
            if(strcmp($cached['info'], $realKey) === 0) {
                $cacheTTL = $cached['ttl'];
            }
        }
        if($cacheTTL === 700) {
            return true;
        }
        return false;
    }
    
    public static function testTypeErrorDefaultTTLNotInt(): bool {
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu();
        //null
        $ttl = null;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type NULL.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //float
        $ttl = 55.55;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($ttl);
            return false;
        }
        //boolean
        $ttl = true;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //array
        $ttl = array(1,3,5);
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //object
        $ttl = new \stdClass;
        $ttl->foo = 7;
        $caught = false;
        try {
            $simpleCache->setDefaultSeconds($ttl);
        } catch(\TypeError $e) {
            $reference = "The default cache TTL must be an integer. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        //make sure we can still set one to a positive integer
        // on same object
        $ttl = 700;
        $key = 'some key for default ttl type test';
        $value = 'some value';
        $simpleCache->setDefaultSeconds($ttl);
        $simpleCache->set($key, $value);
        
        $realKey = $simpleCache->getRealKey($key);
        $info = apcu_cache_info();
        foreach($info['cache_list'] as $cached) {
            if(strcmp($cached['info'], $realKey) === 0) {
                $cacheTTL = $cached['ttl'];
            }
        }
        if($cacheTTL === 700) {
            return true;
        }
        return false;
    }
    
    public static function testTypeErrorKeyNotStringStrict(): bool {
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu(null, null, true);
        $value = '99 bottles of beer on the wall';
        //null
        $key = null;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type NULL.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //integer
        $key = 74237;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type integer.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //float
        $key = 74.237;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type double.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //boolean
        $key = true;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //array
        $key = array(3,4,5);
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //object
        $key = new \stdClass;
        $key->key = 'foo';
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorKeyNotString(): bool {
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu();
        $value = '99 bottles of beer on the wall';
        //null
        $key = null;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type NULL.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //integer
        $key = 74237;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($key);
            return false;
        }
        //float
        $key = 74.237;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($key);
            return false;
        }
        //boolean
        $key = true;
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //array
        $key = array(3,4,5);
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        //object
        $key = new \stdClass;
        $key->key = 'foo';
        $caught = false;
        try {
            $simpleCache->set($key, $value);
        } catch(\TypeError $e) {
            $reference = "The cache key must be a string. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($key);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorTTL_Strict(): bool {
        $key = 'foo';
        $value = 'bar';
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu(null, null, true);
        
        // float
        $ttl = 65.83;
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type double.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        // boolean
        $ttl = true;
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        // array
        $ttl = array(3,4,5);
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        // object
        $ttl = new \stdClass;
        $ttl->foobar = "fubar";
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        return true;
    }
    
    public static function testTypeErrorTTL(): bool {
        $key = 'foo';
        $value = 'bar';
        $simpleCache = new \AliceWonderMiscreations\SimpleCacheAPCu\SimpleCacheAPCu();
        
        // float
        $ttl = 65.83;
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $caught = true;
        }
        if($caught) {
            var_dump($ttl);
            return false;
        }
        // boolean
        $ttl = true;
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type boolean.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        // array
        $ttl = array(3,4,5);
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type array.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        // object
        $ttl = new \stdClass;
        $ttl->foobar = "fubar";
        $caught = false;
        try {
            $simpleCache->set($key, $value, $ttl);
        } catch(\TypeError $e) {
            $reference = "The cache TTL argument must be an integer or a string. You supplied type object.";
            $actual = $e->getMessage();
            if($reference === $actual) {
                $caught = true;
            } else {
                var_dump($actual);
            }
        }
        if(! $caught) {
            var_dump($ttl);
            return false;
        }
        return true;
    }
}

// Dear PSR-2: You can take my closing PHP tag when you can pry it from my cold dead fingers.
?>