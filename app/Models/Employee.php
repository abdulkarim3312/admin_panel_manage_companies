<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;

class Employee extends Model
{
    use HasFactory;

    private static $employee, $data;

    public static function newEmployee($request)
    {
        self::$employee = new Employee();

        self::$employee->company_id   = $request->company_id;
        self::$employee->first_name   = $request->first_name;
        self::$employee->last_name    = $request->last_name;
        self::$employee->email        = $request->email;
        self::$employee->phone        = $request->phone;
        self::$employee->save();
    }

    public static function employeeUpdate($request, $id)
    {
        self::$employee = Employee::find($id);

        self::$employee->first_name   = $request->first_name;
        self::$employee->last_name    = $request->last_name;
        self::$employee->email        = $request->email;
        self::$employee->phone        = $request->phone;
        self::$employee->save();
    }

    public static function employeeDelete($id)
    {
        self::$employee = Employee::find($id);
        self::$employee->delete();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
