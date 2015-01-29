<?php
namespace DreamFactory\Library\Fabric\Api\Common\Packets;

use Symfony\Component\HttpFoundation\Response;

class ErrorPacket extends BasePacket
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param int               $statusCode
     * @param string|\Exception $message
     * @param mixed             $contents
     *
     * @return array The packetized contents
     */
    public static function make( $statusCode = Response::HTTP_NOT_FOUND, $message = null, $contents = null )
    {
        $_packet = static::_create( false, $statusCode, $contents );

        if ( $message instanceof \Exception )
        {
            $_packet['error'] = array(
                'message' => $message->getMessage(),
                'code'    => $message->getCode()
            );

            if ( Response::HTTP_TEMPORARY_REDIRECT == $message->getCode() && method_exists( $message, 'getRedirectUri' ) )
            {
                $_packet['location'] = $message->getRedirectUri();
            }
        }

        return $_packet;
    }
}