<p align="center">
  <img src="http://arbor-education.com/assets/theme/img/arbor_circles.png" alt="Arbor" width="200px" />
</p>

---

# Arbor Education PHP Coding Standard

Repository with PHP coding standard ruleset for Arbor Education repositories.

Coding standards are defined and controlled using [PHP-CS-Fixer][php-cs-fixer] - very popular tool for the purpose and widely used in the PHP ecosystem. Ruleset is based on [PSR-1][psr1] and [PSR-2][psr2] standards, along with few custom rules. Full list of rules can be seen in [rules.php][rules].


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
   
   $finder = PhpCsFixer\Finder::create()
       ->in(__DIR__)
       ->exclude('vendor')
   ;
   
   return PhpCsFixer\Config::create()
       ->setRules($rules)
       ->setFinder($finder)
   ;
   ```

   Custom paths can be include or excluded in this file. For a reference please see [PHP-CS-Fixer documentation][php-cs-fixer].

3. PHP-CS-Fixer creates a cache file that speeds up further fixes. It should be added to `.gitignore`:

   ```
   .php_cs.cache
   ```
   
4. Add Composer scripts into your `composer.json`:

   ```json
   "scripts": {
     "cs-check": "php-cs-fixer fix --config=.php_cs -v --diff --dry-run",
     "cs-fix": "php-cs-fixer fix --config=.php_cs"
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



[php-cs-fixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[psr1]: http://www.php-fig.org/psr/psr-1/
[psr2]: http://www.php-fig.org/psr/psr-2/
[rules]: rules.php
