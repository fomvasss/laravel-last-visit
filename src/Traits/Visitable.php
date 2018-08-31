<?php
/**
 * Created by PhpStorm.
 * User: fomvasss
 * Date: 21.08.18
 * Time: 11:34
 */

namespace Fomvasss\LastVisit\Traits;


trait Visitable
{
    public function isOnline()
    {
        $cacheDriver = config('last-visit.cache_driver', 'file');
        
        return \Cache::store($cacheDriver)->has('user-is-online-' . $this->id);
    }
}