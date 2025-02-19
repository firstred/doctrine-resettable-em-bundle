<?php
declare(strict_types=1);
/*
 * @author     mfris
 * @copyright  PIXELFEDERATION s.r.o.
 * @license    Internal use only
 */

namespace PixelFederation\DoctrineResettableEmBundle\Tests\Functional\app\FailoverAwareTest;

use Doctrine\DBAL\Cache\QueryCacheProfile;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Result;
use PDO;

final class ConnectionMock extends Connection
{
    private string $query;

    public function executeQuery(
        string $sql,
        array $params = [],
               $types = [],
        ?QueryCacheProfile $qcp = null
    ): Result {
        $args = func_get_args();
        $this->query = $args[0];

        return new class extends Result {
            public function __construct()
            {
            }

            public function fetchOne()
            {
                return '1';
            }

            public function fetch($fetchMode = null, $cursorOrientation = PDO::FETCH_ORI_NEXT, $cursorOffset = 0)
            {
                return 1;
            }
        };
    }

    public function getQuery(): string
    {
        return $this->query;
    }
}
