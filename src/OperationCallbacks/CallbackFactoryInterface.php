<?php
namespace Aura\SqlMapper_Bundle\OperationCallbacks;

use Aura\SqlMapper_Bundle\MapperLocator;
use Aura\SqlMapper_Bundle\PlaceholderResolver;
use Aura\SqlMapper_Bundle\RowCacheInterface;
use Aura\SqlMapper_Bundle\Transaction;

/**
 * Defines all the methods used to create Operation Callback methods.
 */
interface CallbackFactoryInterface
{
    /**
     *
     * @param array $operation_list Array of OperationContext objects in the correct order for execution
     *
     * @param PlaceholderResolver $resolver
     *
     * e@param MapperLocator $locator
     *
     * @param array $extracted Row Data extracted from the aggregate object using the RowDataExtractor
     *
     * @return CommitCallback
     *
     */
    public function getCommitCallback(
        array $operation_list,
        PlaceholderResolver $resolver,
        MapperLocator $locator,
        array $extracted
    );

    /** @return Transaction */
    public function getTransaction();

    /** @return InsertCallback */
    public function getInsertCallback();

    /** @return UpdateCallback */
    public function getUpdateCallback();

    /** @return DeleteCallback */
    public function getDeleteCallback();

    /**
     *
     * @param RowCacheInterface $cache From the appropriate row data mapper
     *
     * @param \stdClass $row Object that represents the appropriate row data, can be obtained form Row Data Extractor
     *
     * @param string $mapper_name name of the row data mapper
     *
     * @param string $relation_name name of the relation that this row data belongs to according to aggregate map
     *
     * @return OperationContext
     *
     */
    public function newContext(\stdClass $row, $mapper_name, $relation_name, RowCacheInterface $cache = null);
}