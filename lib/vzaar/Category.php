<?php
    namespace VzaarApi;
    
    use VzaarApi\Resources\Record;
    use VzaarApi\Exceptions\FunctionArgumentEx;
    use VzaarApi\CategoriesList;

    class Category extends Record {
        
        protected static $endpoint;
    
        public function __construct($client = null) {
            
            self::$endpoint = '/categories';
            
            parent::__construct($client);

        }
        
        public function subtree($params = null) {

            $this->assertRecordValid();
        
            return CategoriesList::subtree($this->id, $params, $this->httpClient);

        }
        
        public static function find($params, $client = null) {
            $category = new self($client);
            $category->crudRead($params);
            
            return $category;
        }
    }
?>
