<?php
require_once __DIR__ .  '/../config/database.php';

class Database {
    private $connection;
    private $isConnected = false;
    private $errorMessage = '';

    public function connect() {
        try {
            // Oracle connection string using constants from config
            $connection_string = "(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(HOST=" . DB_HOST . ")(PORT=" . DB_PORT . "))(CONNECT_DATA=(SERVICE_NAME=" . DB_SERVICE_NAME . ")))";
            
            $this->connection = oci_connect(DB_USERNAME, DB_PASSWORD, $connection_string);
            
            if (!$this->connection) {
                $error = oci_error();
                $this->errorMessage = "Connection failed: " . $error['message'];
                $this->isConnected = false;
                return false;
            }else{
               $this->isConnected = true;
            }
            
            return $this->connection;
        } catch (Exception $e) {
            $this->errorMessage = "Connection Error: " . $e->getMessage();
            $this->isConnected = false;
            return false;
        }
    }
    
    public function getConnection() {
        return $this->connection;
    }
    
    public function isConnected() {
        return $this->isConnected;
    }
    
    public function getErrorMessage() {
        return $this->errorMessage;
    }
    
    public function close() {
        if ($this->connection) {
            oci_close($this->connection);
        }
    }
}
?>   