<?php
namespace DreamFactory\Library\Fabric\Api\Common\Services;

use DreamFactory\Library\Fabric\Api\Common\Packets\ErrorPacket;
use DreamFactory\Library\Fabric\Api\Common\Packets\SuccessPacket;
use Symfony\Component\HttpFoundation\Response;

class PacketService extends BaseService
{
    //******************************************************************************
    //* Constants
    //******************************************************************************
    /**
     * @type string The version of this packet
     */
    const PACKET_VERSION = '2.0';

    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @type string The version/type of the packet to generate
     */
    protected $_version = self::PACKET_VERSION;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * @param string $version
     */
    public function __construct( $version = self::PACKET_VERSION )
    {
        $this->_version = $version;
    }

    /**
     * @param int   $code
     * @param mixed $contents
     *
     * @return array
     */
    public function success( $code = Response::HTTP_OK, $contents = null )
    {
        return SuccessPacket::make( $code, $contents );
    }

    /**
     * @param int               $code
     * @param string|\Exception $message
     * @param mixed             $contents
     *
     * @return array
     */
    public function error( $code = Response::HTTP_NOT_FOUND, $message = null, $contents = null )
    {
        return ErrorPacket::make( $code, $message, $contents );
    }
}