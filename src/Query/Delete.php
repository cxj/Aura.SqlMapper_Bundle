<?php
/**
 *
 * This file is part of the Aura Project for PHP.
 *
 * @package Aura.SqlMapper_Bundle
 *
 * @license http://opensource.org/licenses/bsd-license.php BSD
 *
 */
namespace Aura\SqlMapper_Bundle\Query;

use Aura\Sql\ExtendedPdo;
use Aura\SqlQuery\Common\DeleteInterface;

/**
 *
 * An object to perform DELETE queries directly against the database.
 *
 * @package Aura.SqlMapper_Bundle
 *
 */
class Delete extends AbstractConnectedQuery
{
    /**
     *
     * @param DeleteInterface $query
     *
     * @param ExtendedPdo $connection
     *
     */
    public function __construct(
        DeleteInterface $query,
        ExtendedPdo $connection
    ) {
        $this->query = $query;
        $this->connection = $connection;
    }

    /**
     *
     * Execute the query and return the number of rows affected.
     *
     * @return int
     *
     */
    public function perform()
    {
        $stmt = $this->connection->perform(
            $this->query->__toString(),
            $this->query->getBindValues()
        );
        return $stmt->rowCount();
    }
}
