# Fast Gcm Topic#

[![Join the chat at https://gitter.im/frknikiz/fast-gcm-topic](https://img.shields.io/badge/GITTER-join%20chat-green.svg)](https://gitter.im/frknikiz/fast-gcm-topic?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Total Downloads](https://poser.pugx.org/frknikiz/fast-gcm-topic/downloads)](https://packagist.org/packages/frknikiz/fast-gcm-topic) [![License](https://poser.pugx.org/frknikiz/fast-gcm-topic/license)](https://packagist.org/packages/frknikiz/fast-gcm-topic)

Easily send push notifications to devices by using GCM(Google Cloud Messaging) Topics.
> This packages is only available for Laravel 4.*



# Library Features #

- Send Topic Messages to devices.

# Installation #
Begin by installing this package through Composer. Edit your project's `composer.json`

    "require": {
    		"frknikiz/fast-gcm-topic":"dev-master"
    }


Next, update Composer from the Terminal:

	composer update


Open app/config/app.php, and add a new item to the providers array.

	'Frknikiz\Fastgcmtopic\FastgcmtopicServiceProvider'

Publish config from the Terminal:

	php artisan config:publish frknikiz/fast-gcm-topic

Finally, You must enter key value that you got from Google Cloud Messaging API in `app/config/packages/frknikiz/fast-gcm-topic/conf.php`
# Usage #

    $topic_link='/topics/foo-bar';

    $data=array(
      'title'=>"Hello",
      'message'=>"World !!"
    );

	FastGcmTopic::sendTopic($topic_link,$data);

Output:

	object(stdClass)[138]
	    public 'message_id' => float 8.2346410779436E+18

For more information about the topic Messaging: [Topic Messaging](https://developers.google.com/cloud-messaging/topic-messaging)

# References #

[Php Curl Class](https://github.com/php-curl-class/php-curl-class)
License
--------

    Copyright 2015 Furkan İKİZ.

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.


