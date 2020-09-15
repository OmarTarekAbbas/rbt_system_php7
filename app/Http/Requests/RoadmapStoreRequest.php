<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoadmapStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_title' => 'required' ,
            'event_color' => 'required',
            'event_code' => '',
            'event_start_date' => 'required',
            'event_end_date' => 'required',
            'event_status' => '',
            'country_id' => 'required',
            'aggregator_id' => 'required',
            'operator_id' => 'required',
            'occasion_id' => 'required',
            // 'aggregator_support' => 'required',
            // 'operator_support' => 'required',
            // 'promotion_support' => 'required',
            'entry_by' => '',
            'provider_id' => '',
            'content_id' => '',
            'content_track_ids' => ''
        ];
    }
}
