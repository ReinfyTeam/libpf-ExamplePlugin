# libpf ExamplePlugin

This repository is a small PocketMine-MP example plugin for the [ReinfyTeam/libpf](https://github.com/ReinfyTeam/libpf) profanity-filtering library. It demonstrates how a consumer can inspect chat messages, cancel a message containing a configured word and replace profanity before sending the message onward.

## Requirements

- PocketMine-MP API `4.0.0`, as declared by the current `plugin.yml`.
- PHP 8.1 or newer for development checks.
- The `ReinfyTeam\libpf\libpf` API supplied through the consumer's supported library/Virion workflow.

This repository is an example consumer, not the library itself. Its current API 4 manifest is retained deliberately; the Composer development dependency on PocketMine-MP 5 is used for analysis and does not by itself change the plugin's declared runtime API.

## Behavior

The plugin registers a chat listener and uses `libpf::defaultProfanity()` with `libpf::detectProfanity()`. When a match is found, it warns the player, cancels the original event and applies `removeProfanity()` and `removeUnicode()` to the replacement message. Review this behavior before using the example as a moderation policy in production.

## Build and test

Install the locked development dependencies and run the available checks:

```sh
composer install
vendor/bin/phpstan analyse -c phpstan.neon.dist
```

The repository uses a small `tools/stubs/libpf/` declaration for static analysis. A real consumer should load the actual library through its supported packaging flow and should test the resulting behavior on the target PocketMine-MP API.

## Support and license

For library API questions, see the [libpf repository](https://github.com/ReinfyTeam/libpf). For example-plugin issues, open an [issue](https://github.com/ReinfyTeam/libpf-ExamplePlugin/issues) with the plugin revision, server version and relevant logs.

The example plugin is licensed under [MIT](LICENSE) and preserves the ReinfyTeam author credits from the project metadata. This license applies to the example consumer; it does not replace the license of the `libpf` library.
