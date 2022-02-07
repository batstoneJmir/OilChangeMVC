<?php

namespace app\core;

use Exception;

class Database
{

    public \PDO $pdo;

    public function __construct(array $config)

    {
        try {


            $dsn = $config['dsn'] ?? '';
            $username = $config['username'] ?? '';
            $password = $config['password'] ?? '';


            $this->pdo = new \PDO($dsn, $username, $password);
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            dd($e->getMessage());
        }
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        dd($toApplyMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }
            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            dd($className);
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations(
           id INT AUTO_INCREMENT PRIMARY KEY,
           migration VARCHAR(255),
           created_at TIMESTAMP DEFAULT NOW()
           )ENGINE=INNODB;");
    }

    public function getAppliedMigrations()
    {

        $statment = $this->pdo->prepare("SELECT migration FROM migrations");
        $statment->execute();

        return $statment->fetchAll(\PDO::FETCH_COLUMN);
    }
}
