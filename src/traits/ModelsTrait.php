<?php

namespace Grooveland\Helpers\traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

trait ModelsTrait
{
    use CheckerTrait;
    
    /**
     * Data model
     *
     * @var Model
     */
    protected $model = null;

    public function setModel($model)
    {
        if (!$this->instanceof($model, [Model::class, Builder::class])) {
            $model = null;
        }
        $this->model = $model;
        return $this;
    }

    public function getModel()
    {
        return $this->model;
    }


    protected function getValueFromModel(Model $model, ?string $field, $default = null)
    {
        if (is_null($field)) {
            return $default;
        }

        $value = $model->$field;
        if (is_null($value)) {
            to_array($field);

            if (count($field) > 1) {
                foreach ($field as $param) {
                    if ($this->instanceof($model, [Collection::class])) {
                        $value = $this->getValueFromCollection($model, $param);
                    } else {
                        $value = $this->getValueFromModel($model, $param);
                    }

                    if ($this->instanceof($value, [Model::class, Collection::class])) {
                        $model = $value;
                    }
                }
            } else {
                $value = $model->{reset($field)};
            }
        }

        if (is_null($value)) {
            $value = $default;
        }
        
        return $value;
    }

    protected function getValueFromCollection(Collection $collection, ?string $key, $default = null)
    {
        if (is_null($key)) {
            return $default;
        }
        
        $value = $default;
        foreach ($collection as $_key => $_value) {
            if ($_key == $key) {
                $value = $_value;
                break;
            }
        }

        return $value;
    }
}
