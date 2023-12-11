<?php

enum AdminLevel
{
    case Admin;
    case SuperAdmin;

    public function getLabel(): string
    {
        return match ($this) {
            self::Admin => 'admin',
            self::SuperAdmin => 'super admin',
        };
    }
}
