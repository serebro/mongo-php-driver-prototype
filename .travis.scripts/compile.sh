#!/bin/bash
trap abort_on_failure ERR

LCOV_VERSION=1.11


abort_on_failure () {
	echo "Last command failed, exising"
	exit 42;
}

build_lcov() {
	mkdir tmp-lcov
	pushd tmp-lcov
		wget -O lcov.tar.gz http://downloads.sourceforge.net/ltp/lcov-${LCOV_VERSION}.tar.gz
		tar zxf lcov.tar.gz --strip-components=1
		sudo make install
	popd
}
build_lcov

phpize
./configure --enable-developer-flags --enable-coverage
make patch
make all
sudo make install
echo "Use the most-up-to-date run-tests.. old ones like 5.3 don't report failure exit codes"
wget -O run-tests.php https://raw.githubusercontent.com/php/php-src/master/run-tests.php



rm -rf tmp-lcov tmp # coveralls may pick it up and lie about our coverage

echo "extension=phongo.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`

MONGO=`which mongo`
mongod --version
ls $MONGO*
pwd


