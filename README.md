# modman-generator
Simple script which helps generate Magento modman file based upon "git ls-files" command. It's useful on create package with usage of [magento-composer-installer](https://github.com/magento-hackathon/magento-composer-installer).

## Usage
To generate modman file just go to your Magento project root directory and run:

    modman-generate

## How it works
It get all files under GIT by command `git ls-files`.
It excludes files by masks
- modman
- composer.json
- composer.lock
- .gitignore
- README.md
- LICENSE

It is looking for directories by masks:
- app/code/\*/\*/\*/ (like `app/code/community/Namespace/ModuleName/`)
- app/design/\*/\*/\*/\*/\*/\*/ (like `app/design/adminhtml/default/default/template/namespace/modulename`)
- app/etc/modules/*
- app/locale/*
- lib/\*

It also looks for files from directories:
- shell
- js
- skin
