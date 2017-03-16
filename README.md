<p align="center">
  <img src="http://novaiskra.com/sites/default/files/profilslika/arbor_circles.png" alt="Arbor" width="200px" />
</p>

---

# Arbor Education PHP Coding Standard

Repository with PHP coding standard ruleset for Arbor Education repositories.


## Installation

1. Install package via Composer by running:

   ```bash
   $ composer require --dev arbor-education/php-coding-standard
   ```

2. Add Composer scripts into your `composer.json`:

   ```json
   "scripts": {
     "cs-check": "php-cs-fixer fix --config=.php_cs -v --diff --dry-run",
     "cs-fix": "php-cs-fixer fix --config=.php_cs"
   }
   ```

3. Create file `.php_cs` in the root of your repository with following content:

   ```php
   $rules = include __DIR__ . '/vendor/arbor-education/php-coding-standard/rules.php';
   
   $finder = PhpCsFixer\Finder::create()
       ->in(__DIR__)
       ->exclude('vendor')
   ;
   
   return PhpCsFixer\Config::create()
       ->setRules($rules)
       ->setFinder($finder)
   ;
   ```

Custom paths can be include or excluded in this file. For a reference please see: https://github.com/FriendsOfPHP/PHP-CS-Fixer.


## Usage

* To run checks only:

  ```bash
  $ composer cs-check
  ```

* To automatically fix CS issues:
 
  ```bash
  $ composer cs-fix
  ```
