<?php
  /**
   * Display Bible Gateway Verse of the Day from rss
   */

  /* include magpierss http://magpierss.sourceforge.net/ */
  include 'magpierss/rss_fetch.inc';

  /* version_id is the version to display. 31 is NIV.
    A complete listing of versions can be found here:
    http://www.biblegateway.com/usage/linking/versionslist/
  */
  $version_id = 31;
  $votd_url = "http://www.biblegateway.com/usage/votd/rss/votd.rdf?$version_id";

  $verse = @fetch_rss($votd_url);

  if (is_array($verse)) {
    $verse = $verse->items[0];

    $verse_text = trim($verse['content']['encoded']);
    $verse_ref = $verse['title'];
    $verse_link = $verse['guid'];
  }
  else {
    /* An error has occured. Handle it here. */
  }
?>