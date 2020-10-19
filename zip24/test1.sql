-- table must has unique prefix for prevent SQL injections (step one)
-- fields may own prefix for simpler using it on client
-- `status` may be ENUM but it not nessesary
-- open strpass - optional, but often be need for reparing user system
-- access key need if we have domain-attribute ACL model on client.
-- other person details may be into EAV zipPerson table
create table zipUser
(
    iduser int unsigned auto_increment primary key  comment 'id user',
    status tinyint unsigned not null default 1  comment 'del,{new},active,banned..',

    strlogin      varchar(32)  not null              comment 'user nik',
    stremail      varchar(255) not null              comment 'reg mail',
    strpass       varchar(255) not null default ''   comment 'open password',
    strpw_hash    varchar(255)     null default null comment 'close password',
    strauth_key   varchar(32)      null default null comment 'key for cookie',
    strinit_token varchar(255)     null default null comment 'verification token',
    iidperson     int(11) unsigned null default null comment 'other data for person',

-- common fields for any table:
    iidauthor  int(11) unsigned not null              comment 'auto set',
    created_at datetime         not null              comment 'auto set',
    iidupdater int(11) unsigned     null default null comment 'who changed this',
    updated_at datetime             null default null comment 'auto when updated',
    access     int(11) unsigned not null default 0    comment 'who may access',

-- constraints
    unique index idxEmail (stremail),
    unique index idxLogin (strlogin),
    index idxKey  (strauth_key(8) ), -- first 8 chars in btree index
    index idxPass (strpw_hash(8) ),

    foreign key zipuser_author (iidauthor) references zipUser(iduser) ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key zipuser_updater (iidupdater) references zipUser(iduser) ON DELETE CASCADE ON UPDATE CASCADE
-- before need create table `zipPerson` !!!
--   , foreign key zipuser_person (iidperson) references zipPerson(iduser) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE 'InnoDb' AUTO_INCREMENT=1 COLLATE = utf8_unicode_ci
COMMENT 'main user table from fvn20201018'
;

INSERT INTO `zipUser` (`strlogin`,`stremail`,`strpass`,`iidauthor`,`created_at`,`access`)
VALUES
  ('zipBot', 'bot@zip24.ru', '123', 1, NOW(), 0),
  ('guest', 'guest@zip24.ru', '', 1, NOW(), 0),
  ('admin', 'admin@zip24.ru', 'admin', 3, NOW(), 1)
;
