<?php

  define ('GAMES'     , 18881);
  define ('GAMES_FILE', 'games.json');
  define ('LINES_FILE', 'lines.csv');

  // --- games file is too large to load all in one go - hence we stream read it

  $game   = '';
  $found  = 0;
  $chosen = rand (1, GAMES);
  $games  = fopen (GAMES_FILE, 'r');

  while (!feof ($games))
  {
      $line = fgets ($games);

      if (preg_match ("/^{/", $line))
      {
          $found++;
      }

      if ($chosen == $found)
      {
          $game .= trim ($line);

          if (preg_match ("/^},/", $line))
          {
              break;
          }
      }
  }

  fclose ($games);

  $game     = json_decode (rtrim ($game, ','));
  $stations = array_map ('str_getcsv', file (LINES_FILE));
  $colours  = [];

  foreach ($stations as $station)
  {
      $colours [trim (array_shift ($station))] = strtolower (str_replace (' & ', '-', trim (array_shift ($station))));
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Game #<?= $game->id ?> &raquo; Mornington Crescent</title>
  <link href="https://fonts.googleapis.com/css?family=DM+Mono|Lato|Roboto&display=swap" rel="stylesheet" />
  <style>

    html, body
    {
        background: #e5e5e5;
        font-family: 'Roboto', sans-serif;
        padding: 10px;
        overflow-x: hidden;
    }

    .container
    {
        margin: 0 auto;
        max-width: 600px;
        text-align: center;
        width: 100%;
    }

    h1
    {
        font-family: 'Lato', sans-serif;
        font-size: 1.5em;
        font-weight: 200;
        margin-top: 25px;
    }

    h2
    {
        font-size: 2.5em;
        margin: 10px;
    }

    h3
    {
        color: #333;
        font-size: 1.2em;
        margin: 10px;
    }

    p
    {
        margin: 8px;
    }

    .info p:last-of-type
    {
        margin-top: 16px;
        margin-bottom: 18px;
    }

    .tag
    {
        background: grey;
        border-radius: 10px;
        color: white;
        display: inline-block;
        margin-top: 10px;
        margin-left: 6px;
        padding: 6px 12px;
    }

    hr
    {
        border: 1px dashed grey;
        margin-bottom: 20px;
    }

    .move
    {
        border: 1px solid #555;
        border-radius: 8px;
        box-shadow: 0px 3px 15px rgba(0,0,0,0.25);
        box-sizing: border-box;
        color:white;
        display: flex;
        margin-bottom: 20px;
        padding: 10px;
    }

    .circle
    {
        background: white;
        border: 1px solid grey;
        border-radius: 50%;
        color: black;
        font-size: 1.1em;
        font-weight: bold;
        height: 28px;
        text-align: center;
        line-height: 28px;
        vertical-align: middle;
        width: 28px;
    }

    .player
    {
        flex: 7%;
    }

    .play
    {
        flex: 93%;
        text-align: left;
        padding-left: 10px;
    }

    .place
    {
        font-size: 1.5em;
    }

    .note
    {
        font-size: 1em;
        font-style: italic;
        margin-top: 4px;
    }

    .muted
    {
        color: grey;
    }

    .monospace
    {
        font-family: 'DM Mono', monospace;
    }

    pre.raw
    {
        background: black;
        border-radius: 8px;
        box-shadow: 0px 3px 15px rgba(0,0,0,0.25);
        color: lightgreen;
        font-family: 'DM Mono', monospace;
        font-size: 1rem;
        line-height: 1.3rem;
        padding: 15px;
        text-align: left;
    }

    a,
    a:hover,
    a:visited,
    a:active
    {
        color:inherit;
    }

    .footer
    {
        margin-top: 20px;
        font-size: 0.9rem;
        color: grey;
    }

    .line-bakerloo
    {
        background: #b26300;
    }

    .line-central
    {
        background: #dc241f;
    }

    .line-circle
    {
        background: #ffd329;
    }

    .line-district
    {
        background: #007d32;
    }

    .line-dlr
    {
        background: #00b2a9;
    }

    .line-hammersmith-city
    {
        background: #f4a9be;
    }

    .line-jubilee
    {
        background: #a1a5a7;
    }

    .line-metropolitan
    {
        background: #9b0058;
    }

    .line-northern
    {
        background: #000000;
    }

    .line-piccadilly
    {
        background: #0019a8;
    }

    .line-victoria
    {
        background: #0098d8
    }

    .line-waterloo-city
    {
        background: #93ceba
    }

    .line-winner
    {
        background: #eee;
        color: #de2110;
        border: 1px solid #de2110;
    }

  </style>
</head>
<body>
  <div class="container">
    <h2>Mornington Crescent</h2>
    <h3>
      <a href="https://github.com/pete-rai/mornington-crescent-game-archive/blob/master/README.md">Historical Game Archive</a>
    </h3>
    <div class="info">
      <h1>GAMEID # <?= $game->id ?></h1>
      <p>
        <span class="muted">played on </span><?= date ('D jS M Y', strtotime ($game->started)) ?><span class="muted"> for </span><?= ceil ($game->duration / 60); ?><span class="muted"> mins</span>
      </p>
      <p>
        <span class="muted">between </span><?= $game->players ?><span class="muted"> players</span>
      </p>
      <?php foreach ($game->tags as $tag) { ?>
        <span class="tag"><?= $tag ?></span>
      <?php } ?>
      <p class="muted"><a href="javascript:window.location.reload(true)">refresh</a> this page to see another game from the archive</p>
    </div>
    <?php foreach ($game->moves as $move) { ?>
    <?php if ($move->player == 1) { ?>
      <hr/>
    <?php } ?>
    <div class="move line-<?= $colours [$move->move]?>">
      <div class="player">
        <div class="circle"><?= $move->player ?></div>
      </div>
      <div class="play">
        <div class="place"><?= $move->move ?></div>
        <div class="note"><?= str_replace ('|', '&raquo;', $move->note) ?></div>
      </div>
    </div>
    <?php } ?>
    <hr/>
    <p class="monospace">/* raw data feed */</p>
    <pre class="raw"><?= json_encode ($game, JSON_PRETTY_PRINT | JSON_UNESCAPED_LINE_TERMINATORS) ?></pre>
    <p class="footer">Archived by <a href="http://www.rai.org.uk">Pete Rai</a></p>
  </div>
</body>
</html>
