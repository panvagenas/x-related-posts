CREATE TABLE IF NOT EXISTS `xrp_related` (
  pid1 bigint(20) NOT NULL,
  pid2 bigint(20) NOT NULL,
  post_date DATE NOT NULL,
  score_cats float NOT NULL,
  score_tags float NOT NULL,
  displayed int(11) DEFAULT 0 NOT NULL,
  clicks int(11) DEFAULT 0 NOT NULL,
  update_time TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY id (pid1,pid2),
  PRIMARY KEY (pid1,pid2)
) ENGINE=InnoDB;