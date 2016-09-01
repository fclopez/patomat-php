<?php
class Database
{
    private static $dbName = 'dfoq3nqmfc90f7' ;
    private static $dbHost = 'ec2-184-73-196-82.compute-1.amazonaws.com' ;
    private static $dbUsername = 'fcosobnapryfwe';
    private static $dbUserPassword = '_ujPp-lKeXkSwomOmdmuZZn8Qi';
    private static $dbPort = 5432;
     
    private static $cont  = null;
     
    public function __construct() {
        die('Init function is not allowed');
    }
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
        try
        {
          self::$cont =  new PDO( "pgsql:host=ec2-184-73-196-82.compute-1.amazonaws.com;port=5432;dbname=dfoq3nqmfc90f7;user=fcosobnapryfwe;password=_ujPp-lKeXkSwomOmdmuZZn8Qi"); 
        }
        catch(PDOException $e)
        {
          die($e->getMessage()); 
        }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>