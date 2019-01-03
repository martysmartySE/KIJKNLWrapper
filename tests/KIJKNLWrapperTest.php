<?php 

class KIJKNLWrapperTest extends PHPUnit_Framework_TestCase{


    public function test_getShows(){

      $wrapper = new \martysmartySE\KIJKNLWrapper\KIJKNLWrapper();

      $this->assertObjectHasAttribute("title", $wrapper->getShows()[10]);

    }

    public function test_getShowSeasons(){

        $wrapper = new \martysmartySE\KIJKNLWrapper\KIJKNLWrapper();

        $this->assertObjectHasAttribute("seasonNumber", $wrapper->getShowSeasons("stegemanopdebres.sbs6")[2]);

    }


    public function test_getShowSeasonEpisodes(){

        $wrapper = new \martysmartySE\KIJKNLWrapper\KIJKNLWrapper();

        $this->assertObjectHasAttribute("dateString", $wrapper->getSeasonEpisodes("stegemanopdebres.sbs6", 3)[2]);

    }

  
}