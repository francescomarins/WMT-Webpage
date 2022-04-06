<?php
class Artist {
  public $name;
  public $link;
  public $song;
  public $country;

  public function __construct($name, $link, $song, $country) {
    $this->name = $name;
    $this->link = $link;
    $this->song = $song;
    $this->country = $country;
  }

  public function get_name() {
    return $this->name;
  }

  public function get_link() {
    return $this->link;
  }

  public function get_song() {
    return $this->song;
  }

  public function get_country() {
    return $this->country;
  }
}
?>
