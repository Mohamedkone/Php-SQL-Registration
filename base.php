<?php
/*This php page helps you establish the connection with the 
database you can add "require 'base.php';"  to the page
you want, and retrive or insert data in the database.*/
class Database
{
    private static $dbHost = "localhost";//Insert host name or 'localhost' on local development
    private static $dbName = "user_info";//Insert Database name
    private static $dbUsername = "root";//Insert username or 'root' on local development
    private static $dbUserpassword = "";/*Insert password or 'root' 
                                        on local development on MacOs or 
                                        leave it empty on windows local 
                                        development*/
    
    private static $connection = null;

    public static function connect()
    {

        if (self::$connection == null) 
        {
            try 
            {
                self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName , self::$dbUsername , self::$dbUserpassword);
            } 
            catch (PDOException $e) 
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }

    public static function disconnect()
    {
        self::$connection = null;
    }
}

?>