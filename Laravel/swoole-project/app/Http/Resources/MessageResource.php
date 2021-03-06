<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'userid' => $this->user->name ?? "账号已注销",
            'username' => $this->user->name ?? "账号已注销",
            'src' => $this->user->avatar ?? "",
            'msg' => $this->msg,
            'img' => $this->img,
            'roomid' => $this->room_id,
            'time' => $this->created_at,
        ];
    }
}
