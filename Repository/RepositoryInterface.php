<?php

/*
 * This file is part of the Miky package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Miky\Component\Resource\Repository;

use Miky\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Persistence\ObjectRepository;

/**
 * @author Saša Stamenković <umpirsky@gmail.com>
 * @author Jan Góralski <jan.goralski@lakion.com>
 */
interface RepositoryInterface extends ObjectRepository
{
    const ORDER_ASCENDING = 'ASC';
    const ORDER_DESCENDING = 'DESC';

    /**
     * @param array $criteria
     * @param array $sorting
     *
     * @return mixed
     */
    public function createPaginator(array $criteria = [], array $sorting = []);

    /**
     * @param ResourceInterface $resource
     */
    public function add(ResourceInterface $resource);

    /**
     * @param ResourceInterface $resource
     */
    public function remove(ResourceInterface $resource);
}
