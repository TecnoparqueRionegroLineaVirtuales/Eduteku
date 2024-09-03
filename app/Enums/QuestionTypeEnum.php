<?php

namespace App\Enums;

enum QuestionTypeEnum: string
{
    case TEXT = 'text';
    case IMAGE = 'image';
    case VIDEO = 'video';
    case URL = 'url';
}