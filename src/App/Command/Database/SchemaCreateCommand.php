<?php
/**
 * MaxMilhas Test
 *
 * @author Joubert RedRat <me+github@redrat.com.br>
 */

namespace App\Command\Database;

use App\Command\AbstractCommand;
use App\Command\CommandInterface;

/**
 * Schema Create Command
 *
 * @package App\Command\Database
 */
class SchemaCreateCommand extends AbstractCommand implements CommandInterface
{
    /**
     * {@inheritdoc}
     */
    public function command(array $args): string
    {
        $connection = $this->container->get('db.sqlite');

        /** @var \PDO $pdo */
        $pdo = $connection->getPdo();

        $pdo->query('CREATE TABLE `cpf_blacklist` (
                `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT, 
                `number` VARCHAR(11) NOT NULL,
                `created_at` DATETIME NOT NULL,
                `updated_at` DATETIME DEFAULT NULL
            );'
        );

        $pdo->query('CREATE TABLE `cpf_blacklist_event` (
                `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
                `type` VARCHAR(20) NOT NULL COLLATE BINARY,
                `number` VARCHAR(11) DEFAULT NULL,
                `created_at` DATETIME NOT NULL
            )'
        );

        return "Schema created" . PHP_EOL;
    }
}
