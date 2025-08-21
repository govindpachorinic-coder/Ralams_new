<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblUser extends Model
{

    public $timestamps = false;
    protected $table = 'tbl_user';

    protected $fillable = [
        'SSOID',
        'displayName',
        'dateOfBirth',
        'gender',
        'mobile',
        'postalCode',
        'l',
        'st',
        'designation',
        'department',
        'employeeNumber',
        'departmentId',
        'firstName',
        'lastName',
        'userType',
        'mfa',
        'sansthaAadhaar',
    ];
}
