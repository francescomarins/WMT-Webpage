<?php
class Artist {
  public $name;
  public $link;
  public $song;
  public $songlink;
  public $country;

  public function __construct($name, $link, $song, $songlink, $country) {
    $this->name = $name;
    $this->link = $link;
    $this->song = $song;
    $this->songlink = $songlink;
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

  public function get_songlink() {
    return $this->songlink;
  }

  public function get_country() {
    return $this->country;
  }
}
?>
