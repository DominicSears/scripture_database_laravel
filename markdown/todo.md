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
    - [x] Implement doctrinable for one doctrine can apply to multiple denominations/religions
    - [ ] Users from doctrine
    - [x] Religion
    - [ ] Tags about doctrine
    - [x] Posts about doctrine
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

## Actions
- [x] Users
    - [x] Users must have at least one faith
- [ ] Faiths
    - [ ] Faith must have at least a religion
    - [ ] Faith must have a start time
    - [ ] If multiple faiths, then latest one is automatically updated to user faith_id field
        - [ ] Removing a current faith will set the one before it as the current
- [ ] Religion
    - [ ] Must create a tag when created, if not created
    - [ ] Must have at least one doctrine when created
    - [ ] If there are no denominations, then no denominations should show up
- [ ] Denomination
    - [ ] Can only be created if connected to a religion
    - [ ] Must have at least one doctrine attributed to the denomination
    - [ ] Must create tag when created, if not created
- [ ] Doctrine
    - [ ] Must create a tag when created, if not created
    - [ ] Must have a description
    - [ ] Must be applied to at least one religion, church, or denomination when created
- [ ] Nuggets
    - [ ] Must create a tag when created for support and refutes, if not created
        - [ ] If support or refute, must be applied to a doctrine, denomination, religion, or church
- [ ] Church
    - [ ] Must create a tag when created, if not created
    - [ ] Must have a religion

## Front-end & Authentication
- [x] Laravel Fortify initial setup
