<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Customer extends Model implements Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'mobile',
        'full_address',
        'dob',
        'city',
        'state',
        'pincode',
        'email',
    ];
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'email', 'email');
    }
    public function updateProfile(array $data)
    {
        $this->update([
            'full_name' => $data['full_name'],
            'full_address' => $data['full_address'],
            'city' => $data['city'],
            'state' => $data['state'],
            'pincode' => $data['pincode'],
            'dob' => $data['dob'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
        ]);
    }
}
