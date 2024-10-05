<?php

namespace App\Domains;

use App\Exceptions\MomssiServiceException;

trait DtoTrait
{
    private function removeEmptyValues(array $values): array
    {
        foreach ($values as $key => $value) {
            if (is_null($value)) {
                unset($values[$key]);
            }
        }

        return $values;
    }

    abstract protected function getDtoClass();

    public function toDto()
    {
        try {
            $mapper = new \JsonMapper();
            $values = $this->removeEmptyValues($this->all());
            $json = json_decode(json_encode($values));

            return $mapper->map((object)$json, $this->getDtoClass());
        } catch (\JsonMapper_Exception $e) {
            throw new MomssiServiceException('params error');
        }
    }
}
