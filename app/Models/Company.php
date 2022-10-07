<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    private static $company, $image, $imageName, $imageUrl, $directory, $extension;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'admin/company-logos/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function newCompany($request)
    {
        self::$company = new Company();

        self::$company->name    = $request->name;
        self::$company->email   = $request->email;
        self::$company->website = $request->website;
        self::$company->address = $request->address;
        self::$company->image   = self::getImageUrl($request);
        self::$company->save();
    }

    public static function updateCompany($request, $id)
    {
        self::$company = Company::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$company->image))
            {
                unlink(self::$company->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$company->image;
        }
        self::$company->name    = $request->name;
        self::$company->email   = $request->email;
        self::$company->website = $request->website;
        self::$company->address = $request->address;
        self::$company->image   = self::$imageUrl;
        self::$company->save();
    }

    public static function deleteCompany($id)
    {
        self::$company = Company::find($id);
        if (file_exists(self::$company->image))
        {
            unlink(self::$company->image);
        }
        self::$company->delete();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
