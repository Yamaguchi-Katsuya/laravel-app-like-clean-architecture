<?php

namespace App\Enums;

enum Status: int
{
    case PUBLISH = 1;
    case DRAFT = 2;
    case CLOSED = 3;

    /**
     * @return string
     */
    public function label(): string
    {
        return match($this)
        {
            Status::PUBLISH => '公開',
            Status::DRAFT => '下書き',
            Status::CLOSED => '非公開',
        };
    }

    /**
     * @return array
     */
    public static function toSelectArray(): array
    {
        return [
            Status::PUBLISH->value => Status::PUBLISH->label(),
            Status::DRAFT->value => Status::DRAFT->label(),
            Status::CLOSED->value => Status::CLOSED->label(),
        ];
    }
}
