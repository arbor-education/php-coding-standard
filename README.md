<p align="center">
  <img src="https://arbor-education.com/wp-content/themes/arbor/images/arbor-education-logo.svg" alt="Arbor" width="200px" />
</p>

---

# PHP Coding Standard

Set of coding standard rules for [PHP-CS-Fixer][php-cs-fixer] that applies to all Arbor Education PHP-based projects.

Ruleset is based on [PSR-1][psr1] and [PSR-2][psr2] standards, along with few custom rules. Full list of rules can be seen in [rules.php][rules].


## Installation

1. Install package via Composer by running:

   ```bash
   $ composer require --dev arbor-education/php-coding-standard:@dev
   ```
   
   **Note that package is loaded from a VCS repository which must be specified in `composer.json`**
   
   ```json
   "repositories": [
       {
           "type": "vcs",
           "url":  "git@github.com:arbor-education/php-coding-standard.git"
       }
   ]
   ```

2. Create file `.php_cs` in the root of your repository with following content:

   ```
   <?php
   $rules = require __DIR__ . '/vendor/arbor-education/php-coding-standard/rules.php';
   
   $finder = Symfony\Component\Finder\Finder::create()
       ->files()
       ->name('*.php')
       ->ignoreDotFiles(true)
       ->ignoreVCS(true)
       ->in(__DIR__)
       ->exclude('vendor')
   ;
   
   return PhpCsFixer\Config::create()
       ->setRules($rules)
       ->setFinder($finder)
   ;
   ```

   Custom paths can be included/excluded in this file. For a reference please see [PHP-CS-Fixer documentation][php-cs-fixer].

3. PHP-CS-Fixer creates a cache file that speeds up further fixes. It should be added to `.gitignore`:

   ```
   .php_cs.cache
   ```
   
4. Add Composer scripts into your `composer.json`:

   ```json
   "scripts": {
     "cs-check": "php-cs-fixer fix --config=.php_cs -v --diff --dry-run",
     "cs-fix": "php-cs-fixer fix --config=.php_cs",
     "ci-cs": "git fetch; php-cs-fixer fix --config=.php_cs -v --dry-run --using-cache=no --path-mode=intersection `git diff --name-only --diff-filter=d origin/master | xargs`"
   }
   ```

## Usage

* To run checks only:

  ```bash
  $ composer cs-check
  ```

* To automatically fix CS issues:
 
  ```bash
  $ composer cs-fix
  ```

* To control CS violations in your Continuous Integration process:
 
  ```bash
  $ composer ci-cs
  ```

## IDE integration

If you are using PhpStorm, you can easily make it automatically fix coding standard violations as you are modifying files, by adding new external tool:

![PhpStorm CS Fixer][img-php-storm-cs-fixer]

Notice that relative paths are used when referencing PHP-CS-Fixer binary because it is installed as a dev dependency.



[php-cs-fixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[psr1]: http://www.php-fig.org/psr/psr-1/
[psr2]: http://www.php-fig.org/psr/psr-2/
[rules]: rules.php
[img-php-storm-cs-fixer]: php-storm-cs-fixer.png
