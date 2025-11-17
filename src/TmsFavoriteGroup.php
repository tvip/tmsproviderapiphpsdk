<?php
namespace ProviderTmsApiSdk;

/**
 * @method TmsFavoriteGroup|null get(int $id)
 */
class TmsFavoriteGroup extends TmsBaseModel
{

    protected $path = 'favorite_group';

    /**
     * @var int
     */
    public $id = null;

    /**
     * @var string
     */
    public $name = "";

    public function serialize($jsonData)
    {
        $favoriteGroup = json_decode($jsonData);
        foreach ($favoriteGroup as $key => $value){
            $this->{$key} = $value;
        }
        return $this;
    }

    /**
     * @param int $start
     * @param int $limit
     * @param string $sort
     * @param string $quick_search
     * @return array
     * @throws TmsException
     */
    public function getList($start = 0, $limit = 50, $sort = "", $quick_search = "")
    {
        $params = array(
            'sort' => $sort,
            'quick_search' => $quick_search
        );

        list($favoriteGroups, $total) = parent::getList($params, $start, $limit);

        return [ $favoriteGroups, $total ];
    }

}

