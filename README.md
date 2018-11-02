[maexware] ajaxsearch
===============
Show ajax search results in modal from search

### Manual installation / configuration

Download the SourceCode from Github as zip and extract the module to /source/modules/mx/ajaxsearch

Open composer.json and find "autoload" -> "prs-4" and add line

    "autoload": {
        "psr-4": {
            "maexware\\AjaxSearch\\": "./source/modules/mx/ajaxsearch"
        }
    }

after that perform an 

`composer dump-autoload`

### Composer installation / configuration

In order to install the module via composer run the following commands in commandline in your shop base directory (where the shop's composer.json file is located).


`composer config repositories.maexware/ajaxsearch vcs https://github.com/maexware/ajaxsearch `

`composer require maexware/ajaxsearch:dev-master`

