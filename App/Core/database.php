<?php
declare(strict_types=1);

namespace App\Core;
use App\Contracts\DatabaseInterface;
use PDO;
use PDOException;

class Database implements DatabaseInterface
{
    private static ?PDO $pdo = null;

    public function connection(): PDO
    {
        if (self::$pdo === null) {
            try {
                $dsn = sprintf(
                    'mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                    config('db')['host'],
                    config('db')['port'],
                    config('db')['name']
                );

                self::$pdo = new PDO(
                    $dsn,
                    config('db')['user'],
                    config('db')['pass'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                die('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$pdo;
    }

    public function query(string $query, array $queryData, string $queryDataType = "object"): array|bool
    {
        $statement = $this->connection()->prepare($query);
        if($statement && $statement->execute($queryData)) {
            return $queryDataType === "object" 
            ? $statement->fetchAll(PDO::FETCH_OBJ)
            : $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
}