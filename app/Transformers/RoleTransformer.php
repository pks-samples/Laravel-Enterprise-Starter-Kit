<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Models\Role;

/**
 * Class RoleTransformer
 * @package namespace App\Transformers;
 */
class RoleTransformer extends TransformerAbstract
{

    /**
     * Transform the \Role entity
     * @param \Role $model
     *
     * @return array
     */
    public function transform(Role $model)
    {
        return [
            'id'                => (int) $model->id,

            /* place your other model properties here */
            'name'              => $model->name,
            'display_name'      => $model->display_name,
            'description'       => $model->description,
            'resync_on_login'   => $model->resync_on_login,
            'enabled'           => $model->enabled,

            'created_at'        => $model->created_at,
            'updated_at'        => $model->updated_at
        ];
    }
}
