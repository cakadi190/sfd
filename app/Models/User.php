<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
<<<<<<< HEAD
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $guarded = [];

    // Get Data Borrower
    public function borrower()
    {
        return $this->hasMany(Borrower::class, 'id_user');
    }

    // Deleting Data
    public static function boot()
    {
        parent::boot();
        self::deleting(function($user) {
            $deleting = $user->borrower();
            if($deleting->count() > 0)
            {
                $deleting->each(function($delete) {
                    $delete->delete();
                });
            }
        });
    }
=======
  use HasApiTokens, HasFactory, Notifiable, HasRoles;

  protected $guarded = [];

  // Get Data Borrower
  public function borrower()
  {
    return $this->hasMany(Borrower::class, 'id_user');
  }

  // Deleting Data
  public static function boot()
  {
    parent::boot();
    self::deleting(function ($user) {
      $deleting = $user->borrower();
      if ($deleting->count() > 0) {
        $deleting->each(function ($delete) {
          $delete->delete();
        });
      }
    });
  }
>>>>>>> refs/remotes/origin/main
}
