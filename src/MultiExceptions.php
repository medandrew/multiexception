<?php

namespace Medandrew\Multiexception;

class MultiExceptions
    extends \Exception
    implements \Iterator, \Countable, \ArrayAccess
{
    use Iterator;
    use Count;
    use ArrayAccess;

    protected $data = [];

    public function add(\Throwable $e)
    {
        $this->data[] = $e;
    }

    public function all()
    {
        return $this->data;
    }

    public function empty() {
        return empty($this->data);
    }
}