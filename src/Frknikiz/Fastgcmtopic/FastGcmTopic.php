<?php
    /**
     * Created by Furkan.
     * User: Pc
     * Date: 01.08.2015
     * Time: 14:49
     */

    namespace Frknikiz\Fastgcmtopic;
    use Curl\Curl;

    class FastGcmTopic
    {

        /**
         * Api Key
         * @var null
         */
        private $key=null;
        private $gcm_link=null;
        /**
         * FastGcmTopic constructor.
         *
         */
        public function __construct()
        {
            $key=\Config::get("packages/frknikiz/fast-gcm-topic/conf.key");
            $gcm_link=\Config::get("packages/frknikiz/fast-gcm-topic/conf.gcm_link");

            $this->key=$key==""?\Config::get("fastgcmtopic::conf.key"):$key;
            $this->gcm_link=$gcm_link==""?\Config::get("fastgcmtopic::conf.gcm_link"):$gcm_link;
        }

        private function validate($topic,$param)
        {
            if(empty($this->key))
            {
                throw new \Exception("Invalid Api key");
            }
            if(filter_var($this->gcm_link, FILTER_VALIDATE_URL) === false)
            {
                throw new \Exception("Invalid gcm_link");
            }
            if(empty($topic))
            {
                throw new \Exception("Topic link can not be empty");
            }
            if(!is_array($param))
            {
                throw new \Exception("Param should be array");
            }
        }
        public function sendTopic($topic,$param)
        {

            $this->validate($topic,$param);

            $data=array(
                'to'=>$topic,
                'data'=>$param
            );

            $curl=new Curl();
            $curl->setOpt(CURLOPT_SSL_VERIFYPEER, false);
            $curl->setHeader('Content-Type','application/json');
            $curl->setHeader('Authorization',"key=$this->key");
            $curl->post($this->gcm_link,json_encode($data,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES));

            if($curl->error)
            {
                throw new \Exception("Curl Post Error : ".$curl->error_message);
            }
            return $curl->response;
        }
    }