# Platform for CakePHP 3 Web Application

A skeleton to quickly cook some _gourmet_ [CakePHP][cakephp] web apps.

> __NOTE:__ Platform is in beta, still [missing a couple more packages](#todo)
> but ready to help you quickly get started with your [CakePHP 3][cakephp]
> application.

## But Why?

Put simply, the official app skeleton is very basic (and rightfully so).

Platform, while replicating the official app skeleton as much as possible,
distinguishes itself by a few structural changes, some pre-installed/configured
libraries/plugins and some 'best practices'.

## Pre-installed packages

### PHP packages

* [cakephp/cakephp][cakephp/repo] to power the application.
* [cakephp/migrations][migrations/repo] - the official CakePHP migrations shell.
* [friendsofcake/bootstrap-ui][foc/bootstrap-ui/repo] to Bootstrap*-ify* CakePHP.
* [friendsofcake/crud][foc/crud/repo] to quickly get things going.
* [gourmet/email][email/repo] to better create/manage emails.
* [gourmet/faker][faker/repo] to generate fixture and seed data.
* [gourmet/robo][robo/repo] to run build or other tasks using [Robo][robo].
* [josegonzalez/dotenv][dotenv/repo] to easily manage environment variables.
* [markstory/asset_compress][asset_compress/repo] to handle asset compression,
minification, etc.
* [mobiledetect/mobiledetectlib][mobiledetect/repo].

#### Development dependencies

* [beelab/bowerphp][beelab/bowerphp] for managing web components' packages with [Bower][bower].
* [cakephp/bake][bake/repo] - the official CakePHP bake tool.
* [cakephp/cakephp-codesniffer][codesniffer/repo] - the official CakePHP code
standard sniffs.
* [cakephp/codeception][codeception/repo] the official CakePHP module for
[Codeception][codeception]
* [cakephp/debug_kit][debug_kit/repo] - the official CakePHP debugging tool.
* [codeception/specify][specify/repo] BDD code blocks for PHPUnit & Codeception.
* [codeception/verify][verify/repo] BDD assertion library for PHPUnit.
* [psy/psysh][psysh/repo] runtime developer console, interactive debugger and REPL.
* [gourmet/whoops][whoops/repo] to beautify errors and exceptions (only in debug.
mode).

### CSS/JS assets

Assets are installed using [beelab/bowerphp][beelab/bowerphp]:

* [twbs/bootstrap][bootstrap]
* [jquery/jquery][jquery]

## Get started

It is assumed that you have the following installed globally:

* [Composer][composer] - PHP package manager.
* [Sass][sass] - SCSS converter.

If (or once) you have them all installed, run:

```
composer create-project -s dev gourmet/platform [app_name]
```

This will create the *app_name* project folder and download all dependencies.

## Configure

Platform's configuration is broken into 'scopes':

* application
* asset_compress
* cache
* database
* dispatcher
* email
* error
* log
* paths
* plugin
* routes
* security
* session

This makes configuration a little more organized (compared to a single file)
and easily accessible using your IDE's fuzzy finder (try typing 'log' in the
fuzzy finder, the first matching file should the log config file).

_To reduce the # of requires, a build process should concatenate all these and
use the resulting file in production. It has yet to be implemented._

### Quick Tips

To enable `debug` mode without having to modify any file:

```sh
touch .debug
```

or use the `DEBUG` environment variable.

Because we aren't using [AssetCompress][asset_compress/repo]' to convert `scss`
(all implementations are broken), changes made to files in `webroot/scss` will
not be rendered before the files are converted. To do so, use the `sass` gem like so:

```sh
sass --watch webroot/scss:webroot/css
```

Keep in mind that files in both `webroot/scss` and `webroot/css` need to be committed
as they serve different purposes.

## Provisioning

To keep things DRY and not re-invent the wheel, `ansible-galaxy` (the Ansible
package manager) is used. To install the roles:

```sh
ansible-galaxy install --role-file ansible/requirements.yml --force
```

For more, read [Ansible's official documentation][ansible/docs].

### Local development

A `Vagrantfile` is included to make it easy to start a local VM using the
Ansible provisioner. Modify it to suit your needs, but the defaults should be
a good start in most cases. They assume:

```
Box: trusty64
Box Url:
Memory: 512MB
CPUs: 1
Synced Folders: ./ -> /vagrant (using NFS)
```

The `ansible` provisioner is the preferred method but if you don't have it installed
locally, no worries. A shell provisioner will install Ansible on the VM and run the
playbook.

All you need to do is:

```
vagrant up
```

To manually run the playbook (after an initial `vagrant up`):

```
ansible-playbook ansible/provision.yml \
--private-key=.vagrant/machines/default/virtualbox/private_key \
-i .vagrant/provisioners/ansible/inventory/vagrant_ansible_inventory \
-u root
```

Sometimes, running the above command will trigger the following error:

```
fatal: [default] => SSH Error: Host key verification failed.
```

In those cases, just make sure that your `~/.ssh/known_hosts`

## TODO

* [ ] Use [monolog/monolog][monolog/repo] to handle all types of logging.
See [#2033][cakephp/2033].
* [ ] Add link to [capcake][capcake/repo] deployments.
* [ ] Add link to [rocketeer][rocketeer/repo] deployments.

## Versioning

Platform uses [semantic versioning][semver]:

> Given a version number MAJOR.MINOR.PATCH, increment the:
>
> - MAJOR version when you make incompatible API changes,
> - MINOR version when you add functionality in a backwards-compatible manner,
> and
> - PATCH version when you make backwards-compatible bug fixes.
>
> Additional labels for pre-release and build metadata are available as
> extensions to the MAJOR.MINOR.PATCH format.

## License

Copyright (c) 2015, Jad Bitar and licensed under [The MIT License][mit].

[ansible/docs]://docs.ansible.com
[asset_compress/repo]://github.com/markstory/asset_compress
[bake/repo]://github.com/cakephp/bake
[beelab/bowerphp]://github/beelab/bowerphp
[bootstrap]:http://getbootstrap.com
[bower]://bower.io
[cakephp]:http://cakephp.org
[cakephp/2033]://github.com/cakephp/cakephp/issues/2033
[cakephp/repo]://github.com/cakephp/cakephp
[capcake/repo]://github.com/jadb/capcake
[codeception]:http://codeception.com
[codeception/repo]://github.com/cakephp/codeception
[codesniffer/repo]://github.com/cakephp/cakephp-codesniffer
[composer]://getcomposer.org/doc/00-intro.md#globally
[component/repo]://github.com/robloach/component-installer
[debugbar/repo]://github.com/maximebf/debugbar
[debug_kit/repo]://github.com/cakephp/debug_kit
[dotenv/repo]://github.com/josegonzalez/php-dotenv
[email/repo]://github.com/gourmet/email
[faker/repo]://github.com/gourmet/faker
[foc/bootstrap-ui/repo]://github.com/friendsofcake/bootstrap-ui
[foc/crud/repo]://github.com/friendsofcake/crud
[gourmet/box]://github.com/gourmet/box/
[jquery]:http://jquery.com
[milestones]://github.com/gourmet/platform/issues/milestones
[migrations/repo]://github.com/cakephp/migrations
[mit]:http://www.opensource.org/licenses/mit-license.php
[mobiledetect/repo]://github.com/serbanghita/Mobile-Detect
[monolog/repo]://github.com/seldaek/monolog
[phinx/repo]://github.com/robmorgan/phinx
[phpunit/repo]://github.com/sebastianbergmann/phpunit
[psysh/repo]://github.com/bobthecow/psysh
[robo]:http://robo.li
[robo/repo]://github.com/gourmet/robo
[rocketeer/repo]://github.com/anahkiasen/rocketeer
[semver]:http://semver.org
[specify/repo]://github.com/codeception/specify
[vagrant]:http://vagrantup.com
[verify/repo]://github.com/codeception/verify
[whoops/repo]://github.com/gourmet/whoops
