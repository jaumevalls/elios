<?

/* class engine page
*  Written by:     Jaume Valls
*  First Release:  
*  Description: Class file to manage the login sstem
*/

include_once 'conf/psl-config.php';

class login {
    
    protected static $connection;
    
    public function connectDb ()
    {
        if (isset(self::$connection))
        {
            self::$connection = new mysqli(HOST,USER,PASSWORD,DATABASE);
        }
        if (self::$connection->connect_error)
        {
            die("Could not connect to the MySQL server at localhost.");
        }        
        
        return self::$connection;
    }
    
    
    
    
}

?>