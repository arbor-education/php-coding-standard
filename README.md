<p align="center">
  <img src="https://arbor-education.com/wp-content/themes/arbor/images/arbor-education-logo.svg" alt="Arbor" width="200px" />
</p>

---

# PHP Coding Standard

Set of coding standard rules for [PHP-CS-Fixer][php-cs-fixer] that applies to all Arbor Education PHP-based projects. Ruleset is based on [PSR-1][psr1], [PSR-2][psr2], and [PSR-12][psr12] standards, along with few custom rules. Full list of rules can be seen in [rules.php][rules].


## Installation

1. Install package via Composer by running:

   ```bash
   $ composer require --dev arbor-education/php-coding-standard
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

   ```php
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

## Beta Rules

This package includes additional rules in `beta-rules.php` that may cause breaking changes in certain file types. Currently, the beta rules include `no_superfluous_phpdoc_tags` which may introduce breaking changes to systems that use docblocks for code generation, eg SIS REST API.

### Using Beta Rules
To use beta rules in your project, modify your `.php_cs` configuration:

```php
<?php
$baseRules = require __DIR__ . '/vendor/arbor-education/php-coding-standard/rules.php';
$betaRules = require __DIR__ . '/vendor/arbor-education/php-coding-standard/beta-rules.php';

// Merge beta rules with main rules
$rules = array_merge($baseRules, $betaRules);

//then continue as above in the regular configuration
```

## IDE integration

If you are using PhpStorm, you can easily make it automatically fix coding standard violations as you are modifying files, by adding new external tool:

![PhpStorm CS Fixer][img-php-storm-cs-fixer]

Notice that relative paths are used when referencing PHP-CS-Fixer binary because it is installed as a dev dependency.

## Releasing a New Version

This package uses [Semantic Versioning](https://semver.org/) and git tags for version management.

### Process for Releasing a New Version:

1. **Create a feature branch** for your changes
2. **Make your changes** and commit them
3. **Create a Pull Request** for review
4. **After PR is approved and merged** to master:
```bash
# After PR is merged to master
git checkout master
git pull origin master
git tag -a v2.1.0 -m "Version 2.1.0: Add PSR12 support and new coding rules"
git push origin v2.1.0
```

### Version Number Guidelines:
- **Patch version** (bug fixes): `2.0.6` → `2.0.7`
- **Minor version** (new features): `2.0.6` → `2.1.0`
- **Major version** (breaking changes): `2.0.6` → `3.0.0`

### Projects Using This Package:
Projects can then update to the new version:
```bash
composer update arbor-education/php-coding-standard
```

[php-cs-fixer]: https://github.com/FriendsOfPHP/PHP-CS-Fixer
[psr1]: http://www.php-fig.org/psr/psr-1/
[psr2]: http://www.php-fig.org/psr/psr-2/
[psr12]: https://www.php-fig.org/psr/psr-12/
[rules]: rules.php
[img-php-storm-cs-fixer]: php-storm-cs-fixer.png
