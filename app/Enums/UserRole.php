<?php
namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRole extends Enum
{
    const Superadmin = 'superadmin';
    const Admin = 'admin';
    const Approver = 'approver';
}