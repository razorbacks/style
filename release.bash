#!/bin/bash

RAZORBACKS_STYLE_CDN='https://cdn.walton.uark.edu'

set -e

if [ -z "$1" ]; then
    echo "version required"
    exit 1
fi

# move to working directory
cd $( dirname "${BASH_SOURCE[0]}" )

# set RAZORBACKS_STYLE_CDN Manifest class constant
sed -r -i "s~const RAZORBACKS_STYLE_CDN = '.*'~const RAZORBACKS_STYLE_CDN = '$RAZORBACKS_STYLE_CDN'~" php/Manifest.php

# add version to script
sed -r -i "s/const VERSION = '.+\-dev'/const VERSION = '$1'/" php/Manifest.php
# I don't like npm's tag prefix 'v'
npm --no-git-tag-version version "$1"
npm run prod
git add .
git commit -m "release version $1"
git tag -m "release version $1" -s "$1"

# bump to -dev
sed -i "s/const VERSION = '$1'/const VERSION = '$1-dev'/" php/Manifest.php
npm --no-git-tag-version version "$1-dev"
git commit -am "bump version $1-dev"
