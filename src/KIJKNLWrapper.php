<?php

namespace martysmartySE\KIJKNLWrapper;

/*
 * This is a first initial wrapper. It contains the API requests I require in my project. Feel free to send in new features or requests, and I'll take a look at it
 *
 */
class KIJKNLWrapper
{

    public function getShows(){

        $shows = [];

        $data = json_decode(\Httpful\Request::get("https://api.kijk.nl/v2/templates/page/abc")->expectsJson()->send());

        foreach($data->components[1]->data->items[1]->data->items as $letters){

            foreach($letters->data->items as $item){

                array_push($shows, $item);

            }

        }

        return $shows;

    }

    public function getShowSeasons($showid){

        $seasons = [];

        $data = json_decode(\Httpful\Request::get("https://api.kijk.nl/v2/templates/page/format/" . $showid)->expectsJson()->send());

        foreach($data->components as $component){

            if($component->id == "tabular_view"){

                foreach($component->data->items as $dataitem){

                    if($dataitem->id == "season-list"){

                        foreach($dataitem->data->items as $item){

                            array_push($seasons, $item);

                        }

                    }

                }

            }

        }

        return $seasons;

    }

    public function getSeasonEpisodes($showid, $seasonNumber){

        $episodes = [];

        $data = json_decode(\Httpful\Request::get("https://api.kijk.nl/v1/default/seasons/$showid/$seasonNumber/episodes")->expectsJson()->send());

        foreach($data->items as $item){

            array_push($episodes, $item);

        }

        return $episodes;

    }


}