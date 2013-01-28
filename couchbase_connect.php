<?php 

class CouchbaseConnect {
  

  // connection to couchbase (static-shared)
  public static $cb;
  

  // class method to create the connection (call in laravel-root/start.php)
  public static function connect()
  {
  
    // retrieve settings from laravel-root/config/database.php 
		extract(Config::get('database.connections.couchbase'));

    
    // create connection and save into static $cb class var
	  CouchbaseConnect::$cb = new Couchbase($host, $bucket, $password, $bucket, true);

		return CouchbaseConnect::$cb;
	}
 

  // can be used to get, or CouchbaseConnect::$cb, but if connection hasn't been made, make it
  public static function connection() {
    
    if (!isset(CouchbaseConnect::$cb) || CouchbaseConnect::$cb == NULL) {
      return CouchbaseConnect::connect();
    }
    
    return CouchbaseConnect::$cb;
  }
  
}
