[maexware] ajaxsearch
===============
Show ajax search results in modal from search

### Manual installation / configuration

Open composer.json and find "autoload" -> "prs-4" and add line

    "autoload": {
        "psr-4": {
            "maexware\\": "./source/modules/mx"
        }
    }

after that perform an 

`composer dump-autoload`

### Composer installation / configuration

In order to install the module via composer run the following commands in commandline in your shop base directory (where the shop's composer.json file is located).


`composer config repositories.maexware/admindashboard vcs https://github.com/maexware/admindashboard `

`composer require maexware/admindashboard:dev-master`

