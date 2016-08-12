<?php

namespace EricLagarda\BeatportApi;

use EricLagarda\BeatportApi\BeatportOAuth;

class BeatPortApi
{

    protected $api;

    protected $track;

    public function __construct($parameters)
    {
        $this->api = new BeatportOauth($parameters);
    }


    /**
     * Query Beatport
     *
     * @param  [type] $query
     * @return [type]
     */
    public function query($query)
    {
        return $this->parseData( $this->api->queryApi($query) );
    }


    public function getTrackInfo($id)
    {
        $query = ['id' => $id, 'method' => 'tracks'];
        $this->track = $this->parseData( $this->api->queryApi($query), 'results', 0);
        return $track;
    }


    /**
     * Parse data to object
     *
     * @param  array $response
     * @return object
     */
    private function parseData($response, $data = null, $item = null)
    {
        if($data != null){
            if($item != null){
                return json_encode($response[$data]);
            } else {
                return json_encode($response[$data][$item]);
            }
            
        } else {
            return json_encode($response);
        }
        
    }
}