<?php
namespace Aura\SqlMapper_Bundle\OperationCallbacks;

class UpdateCallback implements TransactionCallbackInterface
{
    /**
     *
     * Logic used to decide what operation to perform on root update for a given context object.
     *
     * Roots will always be update, leafs can be update or delete accordingly.
     *
     * @param OperationContext $context
     *
     * @return OperationContext
     *
     */
    public function __invoke(OperationContext $context)
    {
        $cache = $context->cache;
        $row = $context->row;
        $is_cached = $cache != null && $cache->isCached($row);
        $is_root = $context->relation_name === '__root';
        if ($is_cached || $is_root){
            $context->method = 'update';
        } else {
            $context->method = 'insert';
        }
        return $context;
    }
}