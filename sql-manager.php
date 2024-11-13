<?php

/**
 * ## SqlManager
 * Use this is manage an easy connection to you database
 */
class SqlManager {
    private string $host;
    private string $username;
    private string $password;
    private string $database;

    private $connection;

    public function __construct(string $host, string $username, string $password, string $database) {
        $this->$host = $host;
        $this->$username = $username;
        $this->$password = $password;
        $this->$database = $database;

        $this->connection = mysqli_connect(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );

        if (!$connection) {
            die('Could not connect: ' . mysqli_error($connection));
        };
    }  

    /**
     * This returns an array or map from a query
     */
    public function return_query(string $select = '*', string $from = '', string $where = ''): array {
        $query = "SELECT $select FROM $from";

        if ($where) {
            $query .= " WHERE $where";
        }
        
        return $this->query_private($query)->fetch_assoc();
    }

    /**
     * This returns nothing but will run a query
     */
    public function query(string $query): void {
        $this->query_private($query);
    }

    private function query_private(string $query): array {
        return mysqli_query($this->connection, $this->clean_query($query))
    }

    private function clean_query(string $query): string {
        return mysqli_real_escape_string($this->connection, $query);
    }

    /**
     * Closes the SQL connection
     */
    public function close() {
        mysqli_close($this->connection);
    }
}

?>