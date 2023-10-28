<?php

namespace App\Core\Http\Logmaster;

interface LogMaster_Interface
{
    public function save(string $class, array $data): void;
}
