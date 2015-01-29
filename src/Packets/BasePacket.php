<?php
namespace DreamFactory\Library\Fabric\Api\Common\Packets;

use DreamFactory\Library\Utility\IfSet;
use Illuminate\Support\Facades\Request;

class BasePacket
{
    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Builds a v2 response container
     *
     * @param bool  $success  The success indicator
     * @param int   $statusCode
     * @param mixed $contents The contents
     *
     * @return array
     */
    protected static function _create( $success = true, $statusCode = null, $contents = null )
    {
        $_timestamp = microtime( true );
        $_startTime = IfSet::get( $_SERVER, 'REQUEST_TIME_FLOAT', IfSet::get( $_SERVER, 'REQUEST_TIME', $_timestamp ) );
        $_elapsed = $_startTime - $_timestamp;
        $_id = sha1( $_startTime . Request::server( 'HTTP_HOST' ) . Request::server( 'REMOTE_ADDR' ) );

        return array(
            'status_code' => $statusCode,
            'success'     => $success,
            'response'    => $contents,
            'request'     => array(
                'id'        => $_id,
                'timestamp' => date( 'c', $_startTime ),
                'elapsed'   => (float)number_format( $_elapsed, 4 ),
                'verb'      => Request::method(),
                'uri'       => Request::url(),
                'signature' => base64_encode( hash_hmac( 'sha256', $_id, $_id, true ) ),
            ),
        );
    }
}