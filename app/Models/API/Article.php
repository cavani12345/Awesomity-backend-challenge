<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Project",
 *     description="Project model",
 *     @OA\Xml(
 *         name="Project"
 *     )
 * )
 */

class Article extends Model
{

    use HasFactory;


    protected $fillable = [
        'Title',
        'Description',
        'Priority',
    ];



    // relationship with user
    public function user(){
        return $this->belongsTo(User::class);
    }
}
