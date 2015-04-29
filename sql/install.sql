CREATE TABLE IF NOT EXISTS `xrp_ratings` (
  pid1 bigint(20) NOT NULL,
  post_date1 DATE NOT NULL,
  score1_cats float NOT NULL,
  score1_tags float NOT NULL,
  displayed1 int(11) DEFAULT 0 NOT NULL,
  clicks1 int(11) DEFAULT 0 NOT NULL,
  pid2 bigint(20) NOT NULL,
  post_date2 DATE NOT NULL,
  score2_cats float NOT NULL,
  score2_tags float NOT NULL,
  clicks2 int(11) DEFAULT 0 NOT NULL,
  displayed2 int(11) DEFAULT 0 NOT NULL,
  time TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY id (pid1,pid2),
  PRIMARY KEY (pid1,pid2)
) ENGINE=InnoDB;