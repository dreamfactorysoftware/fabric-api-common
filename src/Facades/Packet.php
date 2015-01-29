<?php
namespace DreamFactory\Library\Fabric\Api\Common\Facades;

use DreamFactory\Library\Fabric\Api\Common\Providers\PacketServiceProvider;
use Illuminate\Support\Facades\Facade;
use Symfony\Component\HttpFoundation\Response;

/**
 * Packet
 *
 * @method static array success( int $code = Response::HTTP_OK, array $contents = null );
 * @method static array failure( int $code = Response::HTTP_OK, mixed $message = null, $contents = null );
 */
class Audit extends Facade
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return PacketServiceProvider::SERVICE_ID;
    }

}