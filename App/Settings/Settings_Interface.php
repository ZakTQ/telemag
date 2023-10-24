<?php

namespace App\Settings;

interface Settings_Interface
{
    public function getBotName(): string;

    public function getBotId(): int;

    public function getToken(): string;

    public function getRoutes(): array;
}
