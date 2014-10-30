<?

/* class engine page
*  Written by:     Jaume Valls
*  First Release:  
*  Description: Class file to manage the login sstem
*/

include_once 'conf/psl-config.php';

class login {

    protected static $connection;
    private $hasDB;

    var $perms = array();       //Array : Stores the permissions for the user
    var $userID = 0;            //Integer : Stores the ID of the current user
    var $userRoles = array();   //Array : Stores the roles of the current user


    function __construct ($userID = '')
    {
        session_start();
        ob_start();
        
        if ($userID != '')
        {
            $this->userID = floatval($userID);
        }
        else
        {
            $this->userID = floatval($_SESSION['userID']);
        }
        
        $this->userRoles = $this->getUserRoles('ids');
        $this->buildACL();
    }
    
    function login ($userID='')
    {
        $this->__construct($userID);
    }

    public function connectDb ()
    {
        if (isset(self::$connection))
        {
            self::$connection = new mysqli(HOST,USER,PASSWORD,DATABASE);
        }
        if (!is_resource(self::$connection))
        {
            $this->hasDB = false;
            die("Could not connect to the MySQL server at localhost.");
        }        

        $this->hasDB = true;
        return self::$connection;
    }

    function getUsersRoles()
    {
        
    }


}

?>