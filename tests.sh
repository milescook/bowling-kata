#!/usr/bin/env sh

vendor/phpstan/phpstan/bin/phpstan analyse -l 7 src
if [ $? -eq 0 ]
then
    vendor/phpspec/phpspec/bin/phpspec run
    if [ $? -eq 0 ]
    then
        exit 0
    fi
fi

exit 1
