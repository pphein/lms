<?php

namespace App\Enums;

enum RoleEnum: int
{
    case GUEST = 1;
    case MEMBER = 2;
    case STUDENT = 3;
    case TEACHER = 4;
    case ADMIN = 5;
}
