CREATE database movies;
use movies;

CREATE TABLE `reviewers` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `password` varchar(64) collate utf8_unicode_ci NOT NULL default '',
  `name` varchar(1000) NOT NULL default '',
  `publication` varchar(1000) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
)

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(2000) NOT NULL default '',
  `name` varchar(1000) NOT NULL default '',
  `publication` varchar(1000) NOT NULL default '',
  `review` varchar(10000) NOT NULL default '',
  `reviewrating` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
)

CREATE TABLE `movies` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(2000) NOT NULL default '',
  `director` varchar(100) NOT NULL default '',
  `rating` int(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `runtime` int(100) NOT NULL,
  `boxoffice` int(100) NOT NULL,
  `imagefile` varchar(100) NOT NULL default '',
  PRIMARY KEY  (`id`)
)

INSERT INTO movies (title, director, rating, year, runtime, boxoffice, imagefile)
VALUES ("TMNT","Kevin Munroe","33","2007","90","54132596","tmnt.png");
INSERT INTO movies (title, director, rating, year, runtime, boxoffice, imagefile)
VALUES ("TMNT2","Michael Pressman","36","1991","88","65743921","tmnt2.png");
INSERT INTO movies (title, director, rating, year, runtime, boxoffice, imagefile)
VALUES ("Princess Bride","Rob Reiner","95","1987","98","96756402","princessbride.png");
INSERT INTO movies (title, director, rating, year, runtime, boxoffice, imagefile)
VALUES ("Mortal Kombat","Paul Anderson","74","1995","101","75493024","mortalkombat.png");

INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Peter Debruge","Variety","Ditching the cheeky, self-aware wink that helped to excuse the concept's inherent corniness, the movie attempts to look polished and 'cool,' but the been-there animation can't compete with the then-cutting-edge puppetry of the 1990 live-action movie.
","ROTTEN");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Todd Gilchrist","IGN Movies","TMNT is a fun, action-filled adventure that will satisfy longtime fans and generate a legion of new ones.","FRESH");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Jay Sherman","(unemployed)","It stinks!","ROTTEN");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Joshua Tyler","CinemaBlend.com","The rubber suits are gone and they've been redone with fancy computer technology, but that hasn't stopped them from becoming dull.","ROTTEN");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Jeannette Catsoulis","New York Times","The turtles themselves may look prettier, but are no smarter; torn irreparably from their countercultural roots, our superheroes on the half shell have been firmly co-opted by the industry their creators once sought to spoof.","ROTTEN");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Ed Gonzalez","Slant Magazine","Impersonally animated and arbitrarily plotted, the story appears to have been made up as the filmmakers went along.","ROTTEN");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Mark Palermo","Coast (Halifax, Nova Scotia)","The striking use of image and motion allows each sequence to leave an impression. It's an accomplished restart to this franchise.","FRESH");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT","Steve Rhodes","Internet Reviews","The script feels like it was computer generated. This mechanical presentation lacks the cheesy charm of the three live action films.","ROTTEN");

INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("Princess Bride","Emanuel Levy","emanuellevy.com","One of Reiner's most entertaining films, effective as a swashbuckling epic, romantic fable, and satire of these genres.","FRESH");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("Princess Bride","Variety Staff","Variety","Based on William Goldman's novel, this is a post-modern fairy tale that challenges and affirms the conventions of a genre that may not be flexible enough to support such horseplay.","ROTTEN");

INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT 2","Lloyd Bradley","Empire Magazine","This lacks the darkness and subtlety that makes the first film so good, and so adult, but its simplified plot and gags will appeal to the under tens.","FRESH");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("TMNT 2","Douglas Pratt","DVDLaser","The sequel plays things very safe.","ROTTEN");

INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("Mortal Kombat","Kelly Dunn","existentialsmut.com","Delightfully horrible.  When the overseer of the island tournament throws out catch phrases from the retro arcade game, you can't help but to cringe in delight.","FRESH");
INSERT INTO reviews (title, name, publication, review, reviewrating)
VALUES ("Mortal Kombat","Stefan Birgir Stefansson","sbs.is","cheesy but still, kick ass ","FRESH");

