create table nexus_items
(
    key_item bigint unsigned auto_increment not null,
    caption varchar(250) not null,
    summary text not null,
    program mediumtext not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned not null,
    link varchar(1000) not null,
    ts timestamp not null,
    tags varchar(100),
    data json not null,
    constraint nexus_items_pk
        primary key (key_item)
);

create table nexus_atoms
(
    key_atom bigint unsigned auto_increment,
    key_item bigint unsigned not null,
    title varchar(250) not null,
    status tinyint unsigned default 1 not null,
    type tinyint unsigned not null,
    local varchar(1000) not null,
    global varchar(1000) not null,
    data json not null,
    constraint nexus_atoms_pk
        primary key (key_atom),
    constraint nexus_atoms_nexus_items_key_item_fk
        foreign key (key_item) references nexus_items (key_item)
            on update cascade on delete cascade
);