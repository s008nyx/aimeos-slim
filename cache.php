<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2016
 */


if( php_sapi_name() != 'cli' ) {
	exit( 'Setup can only be started via command line for security reasons' );
}

ini_set( 'display_errors', 1 );
date_default_timezone_set( 'UTC' );


try
{
	require 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

	\Aimeos\Slim\Command\Cache::run( $_SERVER['argv'] );
}
catch( \Aimeos\Slim\Command\Exception $e )
{
	echo $e->getMessage() . "\n";
	echo \Aimeos\Slim\Command\Cache::usage();
	exit( 1 );
}
catch( \Throwable $t )
{
	echo "\n\nCaught PHP error";
	echo "\n\nMessage:\n";
	echo $t->getMessage();
	echo "\n\nStack trace:\n";
	echo $t->getTraceAsString();
	echo "\n\n";
	exit( 1 );
}
catch( \Exception $e )
{
	echo "\n\nCaught exception";
	echo "\n\nMessage:\n";
	echo $e->getMessage();
	echo "\n\nStack trace:\n";
	echo $e->getTraceAsString();
	echo "\n\n";
	exit( 1 );
}
