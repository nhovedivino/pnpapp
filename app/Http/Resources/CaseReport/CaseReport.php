<?php

namespace App\Http\Resources\CaseReport;

use Illuminate\Http\Resources\Json\JsonResource;

class CaseReport extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $img = collect($this->media)->firstWhere('collection_name', 'report-image');
        $video = collect($this->media)->firstWhere('collection_name', 'report_video');

        return [
            'id' => $this->id,
            'crime' => $this->crime,
            'crime_date' => $this->crime_date,
            'name' => $this->name,
            'reported_by' => $this->reported_by,
            'event_detail' => $this->event_detail,
            'action_taken' => $this->action_taken,
            'summary' => $this->summary,
            'address' => $this->address,
            'long' => $this->long,
            'lat' => $this->lat,
            'prepared' => $this->prepared,
            'image_url' => optional($img)->getUrl(),
            'video_url' => optional($video)->getUrl()
        ];
    }
}