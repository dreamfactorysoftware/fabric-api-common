<?php
namespace DreamFactory\Library\Fabric\Api\Common\Packets;

use Symfony\Component\HttpFoundation\Response;

class SuccessPacket extends BasePacket
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param int   $statusCode
     * @param mixed $contents
     *
     * @return array The packetized contents
     */
    public static function make( $statusCode = Response::HTTP_OK, $contents = null )
    {
        return static::_create( true, $statusCode, $contents );
    }

}