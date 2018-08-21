<?php

namespace Grooveland\Helpers\traits;

use Illuminate\Database\Eloquent\Model;

trait ModelsTrait
{
    protected function getValueFromModel(Model $model, string $field)
    {
        $value = $model->$field;
        if (is_null($value)) {
            to_array($field);

            if (count($field) > 1) {
                foreach ($field as $param) {
                    $value = $this->getValueFromModel($model, $param);
                    if ($value instanceof \Illuminate\Database\Eloquent\Model) {
                        $model = $value;
                    }
                }
            } else {
                $value = $model->{reset($field)};
            }
        }
        return $value;
    }
}
