<?php

namespace CodeCommerce\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CodeCommerceRepositoryRepository
 * @package namespace CodeCommerce\Repositories;
 */
interface CodeCommerceRepositoryInterface extends RepositoryInterface
{
	public function findOrFail($id);

	public function fill($dataArray);
}
