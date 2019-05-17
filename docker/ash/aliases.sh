#!/bin/sh

alias ..="cd .."
alias ...="cd ../.."
alias ....="cd ../../.."
alias .....="cd ../../../.."
alias home='cd ~'
alias back='cd $OLDPWD'

alias c='clear'

alias ll='ls -lh'
alias la='ls -alh'

alias ff='find . -type f -name'
alias fd='find . -type d -name'

alias now='date +%T'

alias art='php artisan'
alias artisan='php artisan'
alias db:reset='php artisan migrate:reset && php artisan migrate --seed'
alias dusk='php artisan dusk'
alias fresh='php artisan migrate:fresh'
alias migrate='php artisan migrate'
alias refresh='php artisan migrate:refresh'
alias rollback='php artisan migrate:rollback'
alias seed='php artisan db:seed'
alias serve='php artisan serve --host 0.0.0.0'

alias phpspec='vendor/bin/phpspec'
alias phpunit='vendor/bin/phpunit'

# Create a new directory and enter it
function mkd() {
  mkdir -p "$@" && cd "$@"
}

function md() {
  mkdir -p "$@" && cd "$@"
}

function xtree {
  find ${1:-.} -print | sed -e 's;[^/]*/;|____;g;s;____|; |;g'
}

# Determine size of a file or total size of a directory
function fs() {
  if du -b /dev/null > /dev/null 2>&1; then
    local arg=-sbh;
  else
    local arg=-sh;
  fi
  if [[ -n "$@" ]]; then
    du $arg -- "$@";
  else
    du $arg .[^.]* ./*;
  fi;
}
