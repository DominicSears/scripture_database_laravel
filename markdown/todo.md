# TODO:
___

## Migrations
- [x] Users
- [x] Faith
- [x] Posts
- [x] Tags
- [x] Taggable
- [x] Doctrine
- [x] Religion
- [x] Denomination
- [x] Nugget
- [x] Scriptures

## Relationships
- [x] Users
- [x] Faith
- [x] Posts
- [x] Tags
- [x] Doctrine
- [x] Religion
- [x] Denomination
- [x] Nugget
- [x] Doctrine, Religion, and Denomination connected to Nugget

## Factories
- [x] Users
- [x] Faith
- [x] Posts
- [ ] Tags
- [ ] Taggable
- [x] Doctrine
- [x] Religion
- [x] Denomination
- [ ] Nugget
- [ ] Nuggetable

## APIs & Tests
- [x] Users
    - [x] Retrieve posts
    - [x] Retrieve nuggets
        - [x] Refute
        - [x] Support
        - [x] General
        - [x] All
    - [x] Retrieve region, denomination, etc.
- [x] Faith
    - [x] Retrieve all faiths
    - [x] Retrieve current faith
- [ ] Posts
    - [ ] Posts of types
    - [ ] Posts with tag
- [ ] Tags
    - [ ] Tags must be added when related objects are initialized, if they don't exist
- [ ] Taggable
- [ ] Doctrine
    - [ ] Implement doctrinable for one doctrine can apply to multiple denominations/religions
    - [x] Users from doctrine
    - [ ] Religion
    - [ ] Tags about doctrine
    - [ ] Posts about doctrine
    - [x] Nuggets of doctrine
      - [x] Support
      - [x] Refute
      - [x] General
      - [x] All
- [x] Religion
    - [x] Current users of religion
    - [x] Previous and/or current users of religion
    - [x] Doctrines of religion
    - [x] Nuggets of religion
      - [x] Support
      - [x] Refute
      - [x] General
      - [x] All
- [x] Denomination
    - [x] Current users of denomination
    - [x] Previous and/or current users of denomination
    - [x] Doctrines of denomination
    - [x] Nuggets of denomination
      - [x] Support
      - [x] Refute
      - [x] General
      - [x] All
- [ ] Nugget
- [ ] Churches
- [ ] Scripture
    - [ ] Test that Scriptures can not be out of bounds of the books they are referencing

## Front-end & Authentication
- [x] Laravel Fortify initial setup