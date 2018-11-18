<?php

namespace Grooveland\Helpers\traits;

trait CheckerTrait
{
    protected function instanceof($needle, $haystack)
    {
        if (is_array($haystack)) {
            return $this->instanceofMulti($needle, $haystack);
        }

        if (is_string($needle) && class_exists($needle)) {
            $needle = new $needle;
        }
        return $needle instanceof $haystack;
    }

    protected function instanceofMulti($needle, array $haystack)
    {
        $value = false;
        foreach ($haystack as $instance) {
            $value = $this->instanceof($needle, $instance);
            if ($value) {
                break;
            }
        }

        return $value;
    }
}
