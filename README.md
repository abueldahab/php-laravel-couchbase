# php-laravel-couchbase 


### Drop-in class for PHP's Laravel Framework with Couchbase backend

Copy the file straight from github into libraries, laravel-root is the root folder of your php laravel app...

```bash
cd laravel-root/application/libraries
curl https://raw.github.com/scalabl3/php-laravel-couchbase/master/couchbaseconnect.php > couchbaseconnect.php
```


# Edit Database Configuration Files


In `laravel-root/config/database.php`, there are two sections (arrays), one is the 'default', and the other is 'connections'.

```php
'default' => 'couchbase',
```

Also Add...

```php
'connections' => array(

  'couchbase' => array(
    'host'          => '127.0.0.1',
    'bucket'        => 'default',
    'password'      => '',
    'persist_conn'  => true,
    'display_limit' => 20,  
  ),

),
```


# Edit start.php

```php
/*
|--------------------------------------------------------------------------
| Create a Connection to Couchbase
|--------------------------------------------------------------------------
*/

CouchbaseConnect::connect();
```

# Enable Logging since you're developing

In `laravel-root/config/error.php`, enable logging by setting this to true...

```php
'log' => true,
```

# Use the connection in a blade!

### (...or somewhere better like a model)

```php
{{ Log::write('info', 'Setting Some Info in Couchbase from blade!') }}
{{ Log::write('info', 'CAS = ' . CouchbaseConnect::$cb->set('laravel', 'Couchbase is working in laravel')) }}
{{ Log::write('info', '$cb->get = ' . CouchbaseConnect::$cb->get('laravel')) }}
```