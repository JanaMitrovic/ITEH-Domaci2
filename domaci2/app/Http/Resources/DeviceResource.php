<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeviceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'device';
    public function toArray($request)
    {
        return [
            'id' => $this->resource->id,
            'model' => $this->resource->model,
            'description' => $this->resource->description,
            'origin' => $this->resource->origin,
            'type' => new TypeResource($this->resource->type),
            'company' => new CompanyResource($this->resource->company),
            'user' => new UserResource($this->resource->user)
        ];
    }
}
