<?php

$defaultIncludes = [];
$bootstrapPath = __DIR__ . '/include/bootstrap.php';
if (file_exists($bootstrapPath)) {
    $defaultIncludes[] = $bootstrapPath;
}

return [
    // PsySH uses symfony/var-dumper's casters for presenting scalars,
    // resources, arrays and objects. You can enable additional casters, or
    // write your own!
    'casters' => [
        'MyFooClass' => 'MyFooClassCaster::castMyFooObject',
    ],

    // By default, output contains colors if support for them is detected. To
    // override, use:
    //
    //   \Psy\Configuration::COLOR_MODE_FORCED to force colors
    //   \Psy\Configuration::COLOR_MODE_DISABLED to disable colors
    //   \Psy\Configuration::COLOR_MODE_AUTO to detect terminal support
    'colorMode' => \Psy\Configuration::COLOR_MODE_FORCED,

    // While PsySH ships with a bunch of great commands, it's possible to add
    // your own for even more awesome. Any Psy command added here will be
    // available in your Psy shell sessions.
    'commands' => [
        // The `parse` command is a command used in the development of PsySH.
        // Given a string of PHP code, it pretty-prints the PHP Parser parse
        // tree. It prolly won't be super useful for most of you, but it's there
        // if you want to play :)
        new \Psy\Command\ParseCommand,
    ],

    // "Default includes" will be included once at the beginning of every PsySH
    // session. This is a good place to add autoloaders for your favorite
    // libraries.
    'defaultIncludes' => $defaultIncludes,

    // If set to true, the history will not keep duplicate entries. Newest
    // entries override oldest. This is the equivalent of the
    // `HISTCONTROL=erasedups` setting in bash.
    'eraseDuplicates' => false,

    // While PsySH respects the current `error_reporting` level, and doesn't
    // throw exceptions for all errors, it does log all errors regardless of
    // level. Set `errorLoggingLevel` to `0` to prevent logging non-thrown
    // errors. Set it to any valid `error_reporting` value to log only errors
    // which match that level.
    'errorLoggingLevel' => E_ALL & ~E_NOTICE,

    // Always show array indexes (even for numeric arrays).
    'forceArrayIndexes' => true,

    // Sets the maximum number of entries the history can contain. If set to
    // zero, the history size is unlimited.
    'historySize' => 0,

    // If this is not set, it falls back to `less`. It is recommended that you
    // set up `cli.pager` in your `php.ini` with your preferred output pager.
    'pager' => 'more',

    // Specify a custom prompt.
    'prompt' => '>>> ',

    // PsySH automatically inserts semicolons at the end of input if a statement
    // is missing one. To disable this, set `requireSemicolons` to true.
    'requireSemicolons' => false,

    // Display an additional startup message. You can color and style the
    // message thanks to the Symfony Console tags. See
    // https://symfony.com/doc/current/console/coloring.html for more details.
    'startupMessage' => sprintf('<info>%s</info>', shell_exec('uptime')),

    // You can disable tab completion if you want to. Not sure why you'd
    // want to.
    'tabCompletion' => true,

    // You can write your own tab completion matchers, too! Here are some that
    // enable tab completion for MongoDB database and collection names:
    'tabCompletionMatchers' => [
        new \Psy\TabCompletion\Matcher\MongoClientMatcher,
        new \Psy\TabCompletion\Matcher\MongoDatabaseMatcher,
    ],

    // Frequency of update checks when starting an interactive shell session.
    // Valid options are "always", "daily", "weekly", and "monthly".
    //
    // To disable update checks entirely, set to "never".
    'updateCheck' => 'daily',

    // Enable bracketed paste support. If you use PHP built with readline
    // (not libedit) and a relatively modern terminal, enable this.
    'useBracketedPaste' => true,

    // By default, PsySH will use a 'forking' execution loop if pcntl is
    // installed. This is by far the best way to use it, but you can override
    // the default by explicitly disabling this functionality here.
    'usePcntl' => true,

    // PsySH uses readline if you have it installed, because interactive input
    // is pretty awful without it. But you can explicitly disable it if you hate
    // yourself or something.
    //
    // If readline is disabled (or unavailable) then terminal input is subject
    // to the line discipline provided for TTYs by the OS, which may impose a
    // maximum line size (4096 chars in GNU/Linux, for example) with larger
    // lines being truncated before reaching PsySH.
    'useReadline' => true,

    // PsySH uses a couple of UTF-8 characters in its own output. These can be
    // disabled, mostly to work around code page issues. Because Windows.
    //
    // Note that this does not disable Unicode output in general, it just makes
    // it so PsySH won't output any itself.
    'useUnicode' => true,

    // If multiple versions of the same configuration or data file exist, PsySH
    // will use the file with highest precedence, and will silently ignore all
    // others. With this enabled, a warning will be emitted (but not an
    // exception thrown) if multiple configuration or data files are found.
    //
    // This will default to true in a future release, but is false for now.
    'warnOnMultipleConfigs' => true,
];
