# Lumen Boilerplate

### The purpose of this project

Lumen Boilerplate was created to make kickstarting your new API project easier.

### Is it any good?

[Yes](https://news.ycombinator.com/item?id=3067434)

### Installation

```bash
git clone git@github.com:uCreateit/lumen-boilerplate.git project_name
cd project_name
rm -rf .git
git init
git add .
git commit -m 'Initial boilerplate commit'
git remote add origin git@github.com:uCreateit/project_name.git
git push -u origin master
```

### Contents

It has multiple 3rd party packages installed as well as some addons, extending pure Lumen functionalities.

#### Composer packages

* [Lumen](https://lumen.laravel.com) (duh...)
* [IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
* [Lumen Generator](https://github.com/flipboxstudio/lumen-generator)
* [Roave Security Advisories](https://github.com/Roave/SecurityAdvisories)
* [Composer Git Hooks](https://github.com/BrainMaestro/composer-git-hooks)
* [Parallel Lint](https://github.com/JakubOnderka/PHP-Parallel-Lint)
* [SensioLabs Security Checker](https://github.com/sensiolabs/security-checker)
* [PHP_Codesniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHP Mess Detector](https://github.com/phpmd/phpmd)
* [Pretty Printer for PHPUnit](https://github.com/mikeerickson/phpunit-pretty-result-printer)
* [Lumen Swagger](https://github.com/DarkaOnLine/SwaggerLume) 
* [Laravel Dump Server](https://github.com/beyondcode/laravel-dump-server)
* [RestObjectFetch Middleware](https://github.com/WRonX/Lumen-RestObjectFetch-middleware)

#### Additional configs and shell scripts

* [.circleci](.circleci) /    
  * [check_rejected_commits.sh](.circleci/check_rejected_commits.sh) - checks for rejected commits using Review Tool's API       
  * [config.yml](.circleci/config.yml) - CircleCI config file
  * [schemacrawler.sh](.circleci/schemacrawler.sh) - DB schema ER diagram generation and upload into Review Tool    
* [.deploy](.deploy) /  
  * [commands](.deploy/commmands) /    
    * [parallel_lint.sh](.deploy/commmands/parallel_lint.sh) - PHP Parallel Lint exec script  
    * [phpcs.sh](.deploy/commmands/phpcs.sh) - PHP CodeSniffer exec script
    * [phpmd.sh](.deploy/commmands/phpmd.sh) - PHP Mess Detector exec script
    * [phpunit.sh](.deploy/commmands/phpunit.sh) - PHPUnit exec script
    * [security_checker.sh](.deploy/commmands/security_checker.sh) - SensioLabs Security Checker exec script
  * [phpcs_ruleset.xml](.deploy/phpcs_ruleset.xml) - ruleset for PHP_CodeSniffer
  * [phpmd_ruleset.xml](.deploy/phpmd_ruleset.xml) - ruleset for PHP Mess Detector
  * [pre-commit.sh](.deploy/pre-commit.sh) - git pre-commit hook exec script


#### Additional PHP code and Lumen changes

* example files removed
* moved `User.php` to `app/Models`
* added namespaces for `TestCase.php` and `ExampleTest.php`
* [app/Exceptions/Handler.php](app/Exceptions/Handler.php)
  > Allows API to return clean JSON error responses on unhandled exceptions. Also allows just to throw-and-forget `HttpException` instead of returning `JsonResponse`. 
* [app/Http/Middleware/CorsMiddleware.php](app/Http/Middleware/CorsMiddleware.php)
  > Sets CORS-related response headers
* [app/Http/Middleware/RestObjectFetch.php](app/Http/Middleware/RestObjectFetch.php)
  > Handles retrieving object of specified `ID` for specified routes (ID-requiring routes only; must be configured in routes file). Handles invalid ID and not found errors (for IDs different than simple numeric ones changes needed), fetches object from DB and puts it in request's attributes, accessible for Controller actions as `$request->attributes->get('fetchedObject')`.
