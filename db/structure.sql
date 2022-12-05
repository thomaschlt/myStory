drop table if exists solution;
drop table if exists scenario;
drop table if exists users;
drop table if exists stories;
drop table if exists choix;

CREATE TABLE users (
  usr_id integer not null primary key auto_increment,
  usr_login varchar(50) not null,
  usr_mdp varchar(88) not null,
  is_admin integer default 0
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE stories (
  story_id integer not null primary key auto_increment,
  story_title varchar(100)  not null,
  story_description varchar(800) not null,
  story_writer varchar(150) not null,
  story_year integer not null ,
  story_image varchar(150) default null,
  stats_death integer not null default 0,
  stats_played integer not null default 0,
  stats_win integer not null default 0,
  displayStory integer not null default 1
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE scenario (
  story_id integer not null ,
  scenario_id integer default 1,
  scenario_text varchar(900) not null,
  scenario_question varchar(150) not null,
  solution1 integer null default 0,
  solution2 integer null default 0,
  primary key(story_id,scenario_id),
  foreign key (story_id) references stories(story_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

CREATE TABLE solution (
  story_id integer not null,
  solution_id integer not null,
  solution_text varchar(200) not null,
  continuation integer not null,
  primary key(story_id,solution_id),
  foreign key (story_id) references stories(story_id)
) engine=innodb character set utf8 collate utf8_unicode_ci;

create table choix(
  story_id integer not null,
  usr_id integer not null,
  choix_id integer not null default 1,
  scenario_id integer not null,
  selected_solution integer not null,
  primary key(story_id,usr_id,choix_id)
)engine=innodb character set utf8 collate utf8_unicode_ci;
