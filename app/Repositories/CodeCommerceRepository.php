<?php

namespace CodeCommerce\Repositories;
use Prettus\Repository\Eloquent\BaseRepository;


/**
 * Interface AddressRepository
 * @package namespace CodeCommerce\Repositories;
 */
abstract class CodeCommerceRepository extends BaseRepository implements CodeCommerceRepositoryInterface
{

	/**
	 * Find a model by its primary key or throw an exception.
	 *
	 * @param  mixed  $id
	 * @param  array  $columns
	 * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
	 *
	 * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
	 */
	public function findOrFail($id) {
		return $this->model->findOrFail($id);
	}

	/**
	 * Fill the model with an array of attributes.
	 *
	 * @param  array  $attributes
	 * @return $this
	 *
	 * @throws \Illuminate\Database\Eloquent\MassAssignmentException
	 */
	public function fill($dataArray) {
		return $this->model->fill($dataArray);
	}

}
