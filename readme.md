trepmal/wp-cli-unconfirmed-users
================================

WP-CLI: Manage unconfirmed users in multisite

[![Build Status](https://travis-ci.org/trepmal/wp-cli-unconfirmed-users.svg?branch=master)](https://travis-ci.org/trepmal/wp-cli-unconfirmed-users)

Quick links: [Using](#using) | [Installing](#installing) | [Contributing](#contributing) | [Support](#support)

## Using

This package implements the following commands:

### wp unconfirmed list

List unconfirmed signups from the last two days.

~~~
wp unconfirmed list [--all] [--fields=<fields>] [--format=<format>]
~~~

**OPTIONS**

	[--all]
		Show all unconfirmed users

	[--fields=<fields>]
		Limit the output to specific object fields.

	[--format=<format>]
		Accepted values: table, csv, json, count, ids. Default: table

**EXAMPLES**

    wp unconfirmed list



### wp unconfirmed activate

Activate a user by signup ID, username, email, or activation key

~~~
wp unconfirmed activate <user>
~~~

**OPTIONS**

	<user>
		ID, username, email or key

**EXAMPLES**

    wp unconfirmed activate username



### wp unconfirmed delete

Delete an unconfirmed user by signup ID, username, email, or activation key

~~~
wp unconfirmed delete <user>
~~~

**OPTIONS**

	<user>
		ID, username, email or key

**EXAMPLES**

    wp unconfirmed delete username

## Installing

Installing this package requires WP-CLI v2.1 or greater. Update to the latest stable release with `wp cli update`.

Once you've done so, you can install this package with:

    wp package install git@github.com:trepmal/wp-cli-unconfirmed-users.git

## Contributing

We appreciate you taking the initiative to contribute to this project.

Contributing isn’t limited to just code. We encourage you to contribute in the way that best fits your abilities, by writing tutorials, giving a demo at your local meetup, helping other users with their support questions, or revising our documentation.

For a more thorough introduction, [check out WP-CLI's guide to contributing](https://make.wordpress.org/cli/handbook/contributing/). This package follows those policy and guidelines.

### Reporting a bug

Think you’ve found a bug? We’d love for you to help us get it fixed.

Before you create a new issue, you should [search existing issues](https://github.com/trepmal/wp-cli-unconfirmed-users/issues?q=label%3Abug%20) to see if there’s an existing resolution to it, or if it’s already been fixed in a newer version.

Once you’ve done a bit of searching and discovered there isn’t an open or fixed issue for your bug, please [create a new issue](https://github.com/trepmal/wp-cli-unconfirmed-users/issues/new). Include as much detail as you can, and clear steps to reproduce if possible. For more guidance, [review our bug report documentation](https://make.wordpress.org/cli/handbook/bug-reports/).

### Creating a pull request

Want to contribute a new feature? Please first [open a new issue](https://github.com/trepmal/wp-cli-unconfirmed-users/issues/new) to discuss whether the feature is a good fit for the project.

Once you've decided to commit the time to seeing your pull request through, [please follow our guidelines for creating a pull request](https://make.wordpress.org/cli/handbook/pull-requests/) to make sure it's a pleasant experience. See "[Setting up](https://make.wordpress.org/cli/handbook/pull-requests/#setting-up)" for details specific to working on this package locally.

## Support

Github issues aren't for general support questions, but there are other venues you can try: https://wp-cli.org/#support


*This README.md is generated dynamically from the project's codebase using `wp scaffold package-readme` ([doc](https://github.com/wp-cli/scaffold-package-command#wp-scaffold-package-readme)). To suggest changes, please submit a pull request against the corresponding part of the codebase.*
