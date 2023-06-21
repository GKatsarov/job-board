<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Job extends Model
{
    use HasFactory;

    public static array $experience = ['all'=>null,'Entry'=>'entry','Intermediate'=>'intermediate','Senior'=>'senior'];
    public static array $categories = ['all'=>null,'IT'=>'IT', 'Marketing'=>'Marketing', 'Sales'=>'Sales', 'Finance'=>'Finance', 'Other'=>'Other'];
    public static array $filters = ['search', 'min_salary', 'max_salary', 'category', 'experience'];


    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function scopeFilter(Builder|QueryBuilder $query, array $filters) : Builder|QueryBuilder
    {

        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('employer', function ($query) use ($search) {
                        $query->where('company_name', 'like', "%{$search}%");
                    });
            });
        });


        $query->when($filters['min_salary'] ?? null, fn ($query, $min_salary) => $query->where('salary', '>=', $min_salary));
        $query->when($filters['max_salary'] ?? null, fn ($query, $max_salary) => $query->where('salary', '<=', $max_salary));

        $query->when($filters['category'] ?? null, fn ($query, $category)  => $query->where('category', $category));
        $query->when($filters['experience'] ?? null, fn ($query, $experience) => $query->where('experience', $experience));

        return $query;
    }
}
