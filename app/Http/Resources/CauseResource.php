<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CauseResource extends JsonResource
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
            "id" => $this->id,
            "title" => $this->title,
            "description" => $this->title,
            "location" => $this->location,
            "due_date" => $this->Due_Date,
            "status" => $this->Active == 1 ? "Completed" : "Active",
            "cause_image" => $this->cause_image,
            "documentation_image" => $this->documentation_image,
            "Created_at" => $this->created_at,
            "is_liked" => $this->is_liked_by_auth_user(),
            "is_follower" => $this->isAFollower(),
            "users" => UserResource::collection($this->users),
            "user_count" => $this->users->count(),
            "creator" => $this->creator,
            "links" => [
                'like' => route('causes.like', ['id' => $this->id], false),
                'unlike' => route('causes.unlike', ['id' => $this->id], false),
                'follow' => route('causes.follow', ['id' => $this->id], false),
                'unfollow' => route('causes.unfollow', ['id' => $this->id], false)
            ]
        ];
    }
}
