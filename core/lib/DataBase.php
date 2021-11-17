<?php

/**
 * Class to working with data base
 */
class DataBase {

    private PDO $dataBase;
    private PDOStatement $queryExecutor;

    /**
     * Base constructor for DataBase class
     */
    public function __construct(string $hostname, string $username, string $password, string $dataBaseName) {
        try {
            $dataBase = new PDO("mysql:dbname=".$dataBaseName.";host=".$hostname, $username, $password);
        } 
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Prepared query for subsequent execution
     */
    public function prepareQuery(string $preparedQuery): void {
        self::$queryExecutor = self::$dataBase->prepare($preparedQuery);

        if (self::$queryExecutor === false) {
            die("Invalid prepared query.");
        }
    }

    /**
     * Executes current prepared query
     */
    public function executeQuery(array $queryParams): void {
        if (!isset(self::$queryExecutor)) {
            die("Invalid order of query execution. Prepare query before execute it.");
        }

        try {
            $result = self::$queryExecutor->execute($queryParams); 

            if (!$result) {
                die("Query execution failed.");
            }

            self::$queryExecutor = null; // Unset executor
        }
        catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}