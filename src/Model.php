<?php

namespace App\Models;

use App\Traits\Iterator;
use App\Exceptions\MultiExceptions;

/*
 * Class Model
 * Класс модели
 *
 * @package App\Models
 *
 * @property int $id
 */
abstract class Model
    implements \Iterator
{
    protected static $table = null;

    use Iterator;

    /*
     * Заполняет свойства модели данными из массива
     *
     * @param array $data
     */
    public function fill(array $data)
    {
        $errors = new MultiExceptions();

        foreach ($data as $key => $value) {
            try {
                $this->$key = $value;
            } catch(\Exception $e) {
                $errors->add($e);
            }
        }

        if (!$errors->empty()) {
            throw $errors;
        }
    }
}