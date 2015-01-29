<?php
/**
 * This file is part of the DreamFactory Services Platform(tm) SDK For PHP
 *
 * DreamFactory Services Platform(tm) <http://github.com/dreamfactorysoftware/dsp-core>
 * Copyright 2012-2014 DreamFactory Software, Inc. <support@dreamfactory.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace DreamFactory\Library\Fabric\Api\Common\Providers;

use DreamFactory\Library\Fabric\Api\Common\Services\PacketService;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

/**
 * Register the packet service as a provider with Laravel.
 *
 * To use the "Packet" facade for this provider, you need to add the service provider to
 * your the providers array in your app/config/app.php file:
 *
 *  'providers' => array(
 *
 *      ... Other Providers Above ...
 *      'DreamFactory\Library\Fabric\Api\Common\Providers\PacketServiceProvider',
 *
 *  ),
 */
class PacketServiceProvider extends ServiceProvider
{
    //******************************************************************************
    //* Constants
    //******************************************************************************

    /**
     * @type string My service id
     */
    const SERVICE_ID = 'dfe.packet_service';

    //********************************************************************************
    //* Public Methods
    //********************************************************************************

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //  Register object into instance container
        $this->app->bindShared(
            static::SERVICE_ID,
            function ( $app )
            {
                return new PacketService();
            }
        );

        //  Create an alias for use
        $this->app->booting(
            function ()
            {
                AliasLoader::getInstance()->alias(
                    'Packet',
                    'DreamFactory\\Library\\Fabric\\Api\\Common\\Facades\\Packet'
                );
            }
        );
    }

    /** @inheritdoc */
    public function provides()
    {
        return array(static::SERVICE_ID);
    }

}
