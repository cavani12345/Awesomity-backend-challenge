<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ArticleResource",
 *     description="Article resource",
 *     @OA\Xml(
 *         name="ArticleResource"
 *     )
 * )
 */

 
class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

      /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\\Models\API\Article
     */
     private $data;

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id'=>$this->user_id,
            'Title' => $this->Title,
            'Description' => $this->Description,
            'Priority' => $this->Priority,
            'created_at'=> $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
