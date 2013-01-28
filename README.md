# php-laravel-couchbase 


Drop-in class for PHP's Laravel Framework with Couchbase backend

    cd laravel-root/application/libraries
    curl https://raw.github.com/scalabl3/php-laravel-couchbase/master/couchbaseconnect.php > couchbaseconnect.php
    
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