# Wordpress development stack

Prepared for usually cases like a middle websites, blog.

## Quick start

```
composer create-project studioartcz/wp domain.local --stability dev --no-interaction
```
<sup>* domain.local is your virtual host folder</sup>

and for next steps please follow our [development manual](./.doc/development.md).

## What this stack solving?

- no 3rd-party code in your repository
- error reporting for humans (sentry.io)
- the right development way *(composer, yarn, git)*
- prepared environments *(localhost, stage, production)*
- development tools
- template system twig
- deployment

## Used plugins:

- [Password bcrypt](https://wordpress.org/plugins/password-bcrypt/)
- [Admin Menu Editor](https://wordpress.org/plugins/admin-menu-editor/)
- [Advanced Custom Fields](https://wordpress.org/plugins/advanced-custom-fields/)
- [Maintenance](https://wordpress.org/plugins/maintenance/)
- [Metronet Tag Manager](https://wordpress.org/plugins/metronet-tag-manager/)
- [WP Sentry](https://wordpress.org/plugins/wp-sentry-integration/)
- [WP Tracy](https://wordpress.org/plugins/wp-tracy/)
- [Timber](https://wordpress.org/plugins/timber-library/)
- [WP Super Cache](https://wordpress.org/plugins/wp-super-cache/)
- [Disqus](https://wordpress.org/plugins/disqus-comment-system/)

## Future?

Read project [issues](https://github.com/studioartcz/wp/issues) and let send your ideas, replies, ...
