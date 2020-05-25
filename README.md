# Mornington Crescent Game Archive

> Visit my [Blog](http://www.rai.org.uk) to get in touch or to see demos of my other work.

## Overview

Welcome to this archive! _You've found the Wisden of Mornington Crescent._

Here you will find a detailed record of _every single game of Mornington Crescent that has ever been played_, since its inception in late August 1978 to the start of 2020. The archive scope is all games played in tournaments, leagues, clubs and societies. This is pretty much the whole shebang for the game history - barring personal games, pub games and things like random games played on [radio shows](https://en.wikipedia.org/wiki/I%27m_Sorry_I_Haven%27t_a_Clue) and such.

> If you don't care about all the details and just want to explore the data, then you can use the [Game Explorer](http://rai.org.uk/mcga/) site for that.

## The Opportunity

This is a huge opportunity for any machine learning experts. I know that, in the past, ML researchers have balked at the complexity of taking on Mornington Crescent and have instead taken on simpler games such as [Chess](https://en.wikipedia.org/wiki/Deep_Blue_(chess_computer)) and [Go](https://en.wikipedia.org/wiki/AlphaGo). But now the data exists in one place and in one format, I hope that teams will step-up and try and build the first ever, credible robot player of this _very human_ game.

## The Corpus

Gathering this collection has been a labour of love for more than a decade. The records were quite literally 'all over the place'. When I first started collecting games, little did I know the years and miles that would be needed to complete the canonical set. I have been to every county in the United Kingdom and to a great many countries around the Earth.

A key achievement was that I was granted (after a great deal of wrangling) access to the Knoeppfler archives. My sincere thanks to Dr Knoeppfler's family for allowing me to consult this tremendous resource. The Knoeppfler records were hand-written in tiny German script and I was not allowed (for obvious reasons) to remove the paper records from the estate - so this was a huge and time consuming challenge.

I have included all the major game playing organisations worldwide. An odd-ball being the Indian Leagues, which disbanded in late 1998 (after fallout from the Fairlop schism). However, luckily in 2004 records of these were found in a locked cabinet in a basement of Mumbai's [Chunabhatti station](https://en.wikipedia.org/wiki/Chunabhatti_railway_station).

Historians of the game will know, that we finally came to a conclusion on the mythical games which were played behind the [Iron Curtain](https://en.wikipedia.org/wiki/Iron_Curtain) in the late 1980s and early 90s. Word of these only emerged after the [fall of the Soviet Union](https://en.wikipedia.org/wiki/Dissolution_of_the_Soviet_Union), but for many years they were just a rumour. Then in 2012, Austrian historian Prof. Günther von Habsburg uncovered a partial record of games in the undestroyed records the [Stasi](https://en.wikipedia.org/wiki/Stasi). He finally discovered the complete set two years later. I can confirmed that one of these games, played in March 1988, has the _only recorded case of a triple-loop vector across diagonals made in open play_.

I have _not_ included games played under 'Finchley Central' rules. This should not be a surprise, as this is _not_ Mornington Crescent - it is a totally different game! The 'Finchley Central' players are a strange bunch indeed, but as true aficionados of the game know, FC is not cannon. Also, please don't get me started on The Hornchurch Convention weirdos. I will leave it to our American cousins to digitise the Grand Central games.

## The Data

All the data is in the one file [games.json]() and, as the name suggests, is held in JSON format. It is giant array consisting of over 18,000 items. Each item is a single game in the following format:

```json
{
    "id": "8958f7e9dcb793b178b62de5",
    "started": "1978-09-13",
    "duration": 161,
    "players": 3,
    "winner": 1,
    "tags": [
        "Interchanges can be reclaimed",
        "Pivoting after opening play only",
        "Peeking inverted"
    ],
    "moves": [
        {
            "player": 1,
            "move": "Bromley-by-Bow",
            "note": ""
        },
        {
            "player": 2,
            "move": "Brent Cross",
            "note": "challenge | rejected | Peeking inverted"
        },
        {
            "player": 3,
            "move": "Uxbridge",
            "note": "notwithstanding Pivoting after opening play only"
        },
        {
            "player": 1,
            "move": "Richmond",
            "note": ""
        },
        {
            "player": 2,
            "move": "Earls Court",
            "note": "tournament play"
        },
        {
            "player": 3,
            "move": "Whitechapel",
            "note": "last gambit denied"
        },
        {
            "player": 1,
            "move": "Blackhorse Road",
            "note": ""
        },
        {
            "player": 2,
            "move": "Cannon Street",
            "note": "challenge | rejected | Interchanges can be reclaimed"
        },
        {
            "player": 3,
            "move": "Snaresbrook",
            "note": ""
        },
        {
            "player": 1,
            "move": "Mornington Crescent",
            "note": ""
        }
    ]
}
```

Note that:

* ```id``` is always a 28 character string
* ```started``` dates are always in the format ```YYYY-MM-DD```
* ```duration``` is always measured in seconds

Happy Mornington Crescent playing and watch-this-space for the upcoming _Wobbling Bunnies_ game archive.

_– [Pete Rai](http://www.rai.org.uk)_
