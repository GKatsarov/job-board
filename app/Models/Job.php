<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['all'=>null,'Entry'=>'entry','Intermediate'=>'intermediate','Senior'=>'senior'];
    public static array $categories = ['all'=>null,'IT'=>'IT', 'Marketing'=>'Marketing', 'Sales'=>'Sales', 'Finance'=>'Finance', 'Other'=>'Other'];
}
