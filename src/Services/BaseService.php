<?php
namespace DreamFactory\Library\Fabric\Api\Common\Services;

use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerInterface;

class BaseService implements LoggerAwareInterface
{
    //******************************************************************************
    //* Members
    //******************************************************************************

    /**
     * @type LoggerInterface
     */
    protected $_logger;

    //******************************************************************************
    //* Methods
    //******************************************************************************

    /**
     * Sets a logger instance on the object
     *
     * @param LoggerInterface $logger
     *
     * @return $this
     */
    public function setLogger( LoggerInterface $logger )
    {
        $this->_logger = $logger;

        return $this;
    }

    /**
     * @return LoggerInterface
     */
    public function getLogger()
    {
        return $this->_logger;
    }

}