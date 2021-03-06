<?php
/**
 * MemcachedFactory.php
 *
 * @copyright      More in license.md
 * @license        http://www.ipublikuj.eu
 * @author         Adam Kadlec http://www.ipublikuj.eu
 * @package        iPublikuj:Flysystem!
 * @subpackage     Cache
 * @since          1.0.0
 *
 * @date           26.04.16
 */

namespace IPub\Flysystem\Factories\Cache;

use Nette;
use Nette\DI;
use Nette\Utils;

use League\Flysystem;
use League\Flysystem\Cached;

/**
 * Memcached cache
 *
 * @package        iPublikuj:Flysystem!
 * @subpackage     Cache
 *
 * @author         Adam Kadlec <adam.kadlec@fastybird.com>
 */
class MemcachedFactory
{
	/**
	 * @param Utils\ArrayHash $parameters
	 * @param DI\Container $container
	 *
	 * @return Cached\Storage\Memcached
	 */
	public static function create(Utils\ArrayHash $parameters, DI\Container $container)
	{
		/** @var \Memcached $client */
		$client = $parameters->client ? $container->getService($parameters->client) : NULL;

		return new Cached\Storage\Memcached($client, $parameters->key, $parameters->expires);
	}
}
